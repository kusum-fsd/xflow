<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.payments.index');
    }
    public function create()
    {

        return view('admin.payments.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_type' => 'required',
            'MIN_no' => 'required',
            'USD_in' => 'required|numeric',
            'INR_in' => 'required|numeric',
            'deposit_type' => 'required',
            'remark' => 'nullable',
        ]);

        Payment::create($data);

        return redirect()->route('admin.payment.create')->with('success', 'Payment recorded successfully!');
    }
}
