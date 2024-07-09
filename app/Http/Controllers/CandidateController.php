<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Institution;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutions = Institution::get();
        $candidates = Candidate::latest()->get();
        $elections = Election::all();
        return view('candidate', compact('institutions', 'candidates', 'elections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|in:M,F',
            'institution_id' => 'required|integer|exists:institutions,id',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Create a new candidate
        $candidate = new Candidate();
        $candidate->first_name = $request->input('first_name');
        $candidate->middle_name = $request->input('middle_name');
        $candidate->last_name = $request->input('last_name');
        $candidate->image = $imagePath;
        $candidate->gender = $request->input('gender');
        $candidate->institution_id = $request->input('institution_id');
        $candidate->year = $request->input('year');
        $candidate->election_id = $request->input('election_id');
        $candidate->save();

        // Redirect to a specific page with a success message
        return redirect()->back()->with('success', 'Candidate created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
