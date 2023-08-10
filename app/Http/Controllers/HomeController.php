<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Customer;
use App\Models\User;
use App\Models\Branch;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = Customer::count();
        $user = User::whereNotIn('email', ['superadmin@gmail.com'])->count();
        $branch = Branch::count();
        $country = Country::count();

        return view('home', compact('customer', 'user', 'branch', 'country'));
    }
    public function country()
    {
        return view('level');
    }
}
