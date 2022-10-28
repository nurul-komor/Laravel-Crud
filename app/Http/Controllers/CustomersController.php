<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
class CustomersController extends Controller
{
    public function index(){
        $customers = Customers::all();
        $data = compact('customers');
        return view('customers')->with($data);
    }
    public function create(){
        $title = "Create Customer";
        $url = route('customer.create');
        $data = compact('title','url');
        return view('create')->with($data);
    }
    public function store(Request $request ){
        // p($customer->all());
        $customer = new Customers;
        $customer->username = $request['username'];
        $customer->email = $request['email'];
        $customer->address = $request['address'];
        $customer->birthday = $request['birthday'];
        $customer->password = md5($request['password']);
        $customer->save();
        return redirect()->route('customer.create');
    }
    public function edit($id){
        $title = "Update Customer";
        $url = "/customer/".$id;
        $method = "PUT";
        $customer = Customers::find($id);
        $data = compact('title','url','method','customer');
        return view('create')->with($data);

    }
    public function update(Request $request, $customer){

        // print_r($customer);
        $updateData = Customers::find($customer);
        // p($updateData->id);
        $updateData->username = $request['username'];
        $updateData->email = $request['email'];
        $updateData->address = $request['address'];
        $updateData->birthday = $request['birthday'];
        $updateData->save(); 
        return redirect()->route('customers.index');
        
    }
    public function destroy( $id){
        if(!(is_null($id))){
            $customer = Customers::find($id);
            $customer->delete();
        }
        return redirect('/customers');
    }
}