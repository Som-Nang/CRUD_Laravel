<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index(){
        return Inertia::render('index',[
            'customers' => Customer::all()->map(function($customer){
                return[
                    'id'=> $customer->id,
                    'name'=>$customer->name,
                    'phone'=>$customer->phone,
                    'email'=>$customer->email
                ];
            })
        ]);
    }
    public function create(){
        return inertia::render('create');
    }

    public function store(Request $request){
        $validated=$request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:customers',
            'phone'=> 'required|unique:customers|max:14|min:10',
        ]);
        Customer::create($validated);

        return Redirect::route('customers.index')->with('message', 'Customer created successfully');
    }

    public function edit(Customer $customer){
        return Inertia::render('edit', [
            'customer' => $customer
        ]);
    }
    public function update(Request $request, Customer $customer){
        $validated=$request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email',
            'phone'=> 'required|max:14|min:10',
        ]);
        $customer->update($validated);

        return Redirect::route('customers.index') ->with('message', 'Customer update successfully');

    }

    public function destroy(Customer $customer){
        $customer->delete();

        return Redirect::route('customers.index')->with('message', 'Customer deleted successfully');

    }
}
