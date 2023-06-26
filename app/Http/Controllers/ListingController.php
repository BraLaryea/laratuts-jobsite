<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index()
    {
        return view('listings.index', [
            // 'listings' =>  Listing::latest()->filter(request(['tag', 'search']))->get()
            'listings' =>  Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    // show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' =>  $listing
        ]);
    }

    // show create form
    public function create()
    {
        return view('listings.create');
    }

    // store listing
    public function store(Request $request)
    {
        $formFeilds = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', ' email'],
            'tags' => 'required',
            'website' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFeilds['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFeilds['user_id'] = auth()->id();

        Listing::create($formFeilds);

        return redirect('/')->with('message', 'Listing created successfully!');
        // return view('listings.create');
    }

    // show listing edit form 
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // update listing
    public function update(Request $request, Listing $listing)
    {
        // check if logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFeilds = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'email' => ['required', ' email'],
            'tags' => 'required',
            'website' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFeilds['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFeilds);

        return back()->with('message', 'Listing updated successfully!');
        // return view('listings.create');
    }

    // delete listing
    public function destroy(Listing $listing)
    {
        // check if logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }


    // manage listings
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings]);
    }
}
