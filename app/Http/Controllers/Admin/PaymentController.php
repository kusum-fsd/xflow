<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function withdraw()
    {

        return view('admin.payments.withdraw');
    }

}
