<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Country;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches  = Branch::get();
        return view('admin.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all(); // Fetch all countries from the database
        return view('admin.branches.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|string|max:255',
            // other validation rules
        ]);

        $branches = Branch::create($request->all());
        // return redirect()->route('admin.branches.index')->withSuccess('Branch created successfully!!!!!');
        if (!$branches) {
            return redirect()->back()->with('error', 'Error While Creating Branch');
        }
        return redirect()->back()->with('success', 'Branch created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        $employees = $branch->employees;
        return view('branch.show', compact('branch', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  edit($id)
    {
        $branches = Branch::find($id); // Fetch the branch data by its ID
        $countries = Country::all(); // Fetch all countries from the database
        return view('admin.branches.edit', compact('branches', 'countries'));
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
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|string|max:255',
            // Other validation rules
        ]);

        $branches = Branch::where('id', $id)->first();
        // Update customer details

        $branches->name = $request->name;
        $branches->country_id = $request->country_id;
        $branches->save();
        return redirect()->route('admin.branches.index')->withSuccess('Branch updated successfully!');
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

    public function getBranches(Request $request)
    {

        $countryId = $request->input('country_id');
        $branches = Branch::where('country_id', $countryId)->get();

        return response()->json(['branches' => $branches]);
    }
}
