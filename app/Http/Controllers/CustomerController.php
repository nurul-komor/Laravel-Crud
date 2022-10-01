<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
// use App\Models\Customer;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $data = compact("customers");
        return view("data")->with($data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add user";
        $url =  'customers';
        $data = compact('title','url');
        return view('register')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'username' => "required",
            'email' => "required | email | unique:users",
            'password' => "required",
            'confirmPassword' => "required | same:password",
        ]);
        $customer = new Customer;
        $customer->name = $request['username'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->password = md5($request['password']);
        $customer->remember_token = $request['_token'];
        $customer->save();
        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    /* public function edit(Customer $customer)
    {
        // echo $customer;
    } */
    public function edit( $customer)
    {
        $title =  "Update User";
        $url =  'customers/'.$customer;
        $details = Customer::find($customer);
        $method = "PUT";
        $data = compact('title','url','customer','details','method');
        return view('register')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $updateCustomer = Customer::find($customer->id);
        $updateCustomer->name = $request['username'];
        $updateCustomer->email = $request['email'];
        $updateCustomer->save();
        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer = Customer::find($customer);
        if(!(is_null($customer))){
            $customer->each->delete();
        }
            return redirect()->back();
        
    }
    /* public function delete( $customer)
    {
        // echo $customer;
        $customer = Customer::find($customer);
        if($customer){
            $customer->delete();
            return redirect()->back();
        }
            return redirect("/");

    } */
}