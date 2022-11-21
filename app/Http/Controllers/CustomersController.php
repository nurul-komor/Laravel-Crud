<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
class CustomersController extends Controller
{
    public function index(){
        $customers = Customers::paginate(4);
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
         $request->validate([
            'username' => "required",
            'email' => "required | email | unique:users",
            'password' => "required",
            'confirmPassword' => "required | same:password",
        ]);
        // p($customer->all());
        $customer = new Customers;
        $customer->username = $request['username'];
        $customer->email = $request['email'];
        $customer->address = $request['address'];
        $customer->birthday = $request['birthday'];
        $customer->password = md5($request['password']);
        $customer->save();
        $request->session()->flash("status","Successfully Created");
        return redirect("/customers");
    }
    public function edit($id){
        $title = "Update Customer";
        $url = "/customer/".$id;
        $method = "PUT";
        $customer = Customers::find($id);
        if(!is_null($customer)){
            $data = compact('title','url','method','customer');
            return view('create')->with($data);
        }else{
            return redirect('customers');

        }


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
        $request->session()->flash("status","Successfully Edited");
        return redirect()->route('customers.index');
        
    }
    public function destroy( $id,Request $request){
        if(!(is_null($id))){
            $customer = Customers::find($id);
            $customer->delete();
            $request->session()->flash("status","Moved to trash");
        }
        return redirect('/customers');
    }
    public function trash(){
        $customers = Customers::onlyTrashed()->paginate();
        $data = compact('customers');
        return view('customers-trash')->with($data);
    }
    public function restore($id,Request $request){
        $customer = Customers::withTrashed()->find($id);
        if($customer != ""){
            $customer->restore();
            $request->session()->flash("status","Successfully Restored");
        }
        return redirect('customers/trash');
    }
}