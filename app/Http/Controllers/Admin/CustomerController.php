<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers  = Customer::get();
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'nullable|string|max:10',
            'added_by' => 'required|string|max:255',
            'customer_type' => 'required|string|max:255',

            // other validation rules
        ]);
        $customers = Customer::create($request->all());
        if (!$customers) {
            return redirect()->back()->with('error', 'Error While Creating Customer');
        }
        return redirect()->back()->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::find($id);
        return  view('admin.customers.edit', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'nullable|string|max:10',
            'added_by' => 'required|string|max:255',
            'customer_type' => 'required|string|max:255',

        ]);
        $customers = Customer::where('id', $id)->first();
        // Update customer details

        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->mobile_no = $request->mobile_no;
        $customers->added_by = $request->added_by;
        $customers->customer_type = $request->customer_type;
        $customers->save();
        if (!$customers) {
            return redirect()->back()->with('error', 'Error while updating Customer');
        }
        return redirect()->back()->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully');
    }
}
