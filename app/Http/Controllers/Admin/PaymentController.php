<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $payments = $user->payments;
        // return view('admin.payments.index');
        return view('admin.payments.index', compact('payments'));
    }
    public function create()
    {
        $customers = Customer::all();
        return view('admin.payments.create', compact('customers'));
    }

    public function store(Request $request)
    {

        // Create a new payment instance
        $payment = new Payment([
            'mtn_no' => $request->mtn_no,
            'USD_amt' => $request->USD_amt,
            'INR_amt' => $request->INR_amt,
            'remark' => $request->remark,
            'deposite_type' => $request->deposite_type,
            'customer_id' => $request->input('customer_id'), // Set the customer ID
            'user_id' => auth()->user()->id,

        ]);
        // Associate the payment with the customer
        $customer = Customer::findOrFail($request->customer_id);
        $payment->customer()->associate($customer);

        // Save the payment to the database


        $input = $request->all();
        $payments = Payment::create($input);

        // $paymentData = $request->except('customer_id');
        // $payments = $customer->payments()->create($paymentData + ['user_id' => $user->id]);
        // $payment->save();
        // $payments = Payment::create($request->all());
        if (!$payments) {
            return redirect()->back()->with('error', 'Error While Creating Payment');
        }
        return redirect()->back()->with('success', 'Payment created successfully');


        // Redirect or return a response
    }
    public function show($id)
    {

        $customers = Customer::all();
        return view('admin.payments.create', compact('customers', 'id'));
    }
}
