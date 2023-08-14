<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Branch;
use App\Models\Country;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::whereNotIn('email', ['superadmin@gmail.com'])->orderBy('id', 'DESC')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('name', ['SuperAdmin'])->get();
        $countries = Country::all();
        return view('admin.users.create', compact('roles', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'branch_id' => 'nullable',
            'country_id' => 'nullable',
            'mobile_no' => 'nullable|string|max:10',
            'password' => 'required|same:confirm_password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);


        // Country::create(['user_id' => $user->id, 'country_id' => $request->country_id]);

        $user->countries()->sync($request->input('country_id'));

        $user->syncRoles($request->input('roles'));

        if (!$user) {
            return redirect()->back()->with('error', 'User created successfully');
        }
        return redirect()->back()->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $countries = Country::all();
        $userRole = $user->roles->all();

        return view('admin.users.edit', compact('user', 'roles', 'userRole', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'mobile_no' => 'nullable|string|max:10',
            // 'email' => 'required|email|unique:users,email',
            'branch_id' => 'nullable',
            'country_id' => 'nullable',
            // 'password' => 'required|same:confirm_password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        // $input['password'] = Hash::make($input['password']);

        $user->update($input);

        $user->countries()->sync($request->input('country_id'));

        $user->syncRoles($request->input('roles'));

        if (!$user) {
            return redirect()->back()->with('error', 'User updated successfully');
        }
        return redirect()->back()->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
    public function customers()
    {
        $user = auth()->user();
        $customers = $user->customers;

        return view('users.customers.index', compact('customers'));
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
