<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $payments = $user->payments;
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('admin.payments.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mtn_no' => 'required',
            'USD_amt' => 'required',
            'INR_amt' => 'required',
            'deposit_type' => 'required',
            'customer_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new payment instance
        $payment = new Payment([
            'mtn_no' => $request->mtn_no,
            'USD_amt' => $request->USD_amt,
            'INR_amt' => $request->INR_amt,
            'remark' => $request->remark,
            'status' => $request->status,
            'deposite_type' => $request->deposite_type,
            'customer_id' => $request->input('customer_id'), // Set the customer ID
            'user_id' => Auth::user()->id,
            'transaction_no' => $request->transaction_no,

        ]);

        // $transaction_no = $request->input('transaction_no');
        // dd($transaction_no);

        $request->merge(["user_id" => Auth::user()->id]);
        // Associate the payment with the customer
        // $customer = Customer::findOrFail($request->customer_id);
        // $payment->customer()->associate($customer);
        $input = $request->all();
        $payments = Payment::create($input);
        if (!$payments) {
            return redirect()->back()->with('error', 'Error While Creating Payment');
        }
        return redirect()->back()->with('success', 'Payment is done successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customer::all();
        return view('admin.payments.create', compact('customers', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payments = Payment::find($id);
        $customers = Customer::all();
        return  view('admin.payments.edit', compact('payments', 'customers'));
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
        $validator = Validator::make($request->all(), [
            'mtn_no' => 'required',
            'USD_amt' => 'required',
            'INR_amt' => 'required',
            'deposit_type' => 'required',
            'customer_id' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the payment record to update
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->back()->with('error', 'Payment not found');
        }

        // Update the payment attributes
        $payment->update([
            'mtn_no' => $request->mtn_no,
            'USD_amt' => $request->USD_amt,
            'INR_amt' => $request->INR_amt,
            'remark' => $request->remark,
            // 'status' => $request->status,
            'deposite_type' => $request->deposit_type,
            'customer_id' => $request->input('customer_id'), // Set the customer ID
            'transaction_no' => $request->transaction_no,
        ]);

        // return redirect()->back()->with('success', 'Payment updated successfully!');
        return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
