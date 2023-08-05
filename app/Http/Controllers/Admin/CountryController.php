<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries  = Country::get();
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.countries.create');
    }


    public function store(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'required|string|max:255',

            // other validation rules
        ]);
        $countries = Country::create($request->all());
        return redirect()->route('admin.countries.index')->withSuccess('Country created successfully!!!!!');

    }

    public function show(Country $countries)
    {
        // Load all branches belonging to this country
        $branches = $countries->branches;

        return view('countries.show', compact('country', 'branches'));
    }

    //
    public function edit($id)
    {
        $countries = Country::find($id);
        return  view('admin.countries.edit', compact('countries'));
    }

    //


    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            // Other validation rules
        ]);

        $countries = Country::where('id', $id)->first();
        // Update customer details

        $countries->title = $request->title;
        $countries->save();
        return redirect()->route('admin.countries.index')->withSuccess('Country updated successfully!');
    }


    public function destroy(Request $request, $id)
    {
        $countries = Country::findOrFail($id);

        $countries->delete();

        return redirect()->back()->withSuccess('Country deleted successfully!');
    }
}
