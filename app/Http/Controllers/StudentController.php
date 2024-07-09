<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Institution;
use App\Models\Election;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('matric_number', 'ASC')->get();
        return view('student', compact('students'));
    }

    public function login(Request $request)
    {
        // Validate the login form
        $request->validate([
            'matric_number' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log in the admin
        if (Auth::guard('student')->attempt([
            'matric_number' => $request->input('matric_number'),
            'password' => $request->input('password')
        ])) {
            // Redirect to admin dashboard
            return redirect()->intended('/cast-vote');
        }

        // Authentication failed, redirect back to the login form with an error message
        return back()->withErrors([
            'matric_number' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('matric_number'));
    }

    public function dashboard()
    {
        $institutions = Institution::where('id', auth()->user()->institution_id)->get();
        $elections = Election::all();
        $candidates = [];
        return view('voter', compact('institutions', 'elections', 'candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $elections = Election::all();
        $candidates = Candidate::where('institution_id', auth()->user()->institution_id)->get();
        $institutions = Institution::where('id', auth()->user()->institution_id)->get();

        return view('voter', compact('elections', 'candidates', 'institutions'));
    }

    public function castVote(Request $request)
    {
        $candidate_id = $request->candidate_id;
        $election_id = $request->election_id;
        $vid = auth()->user()->id;

        $check = Vote::where('matric_number', auth()->user()->matric_number)->where('election_id', $election_id)->count();
        if($check > 0){
            echo '<script>alert("You have already cast your vote. Duplicate voting not allowed!");history.back();</script>';
        }else{
            $vote = new Vote();
            $vote->matric_number = auth()->user()->matric_number;
            $vote->candidate_id = $candidate_id;
            $vote->election_id = $election_id;
            $vote->institution_id = auth()->user()->institution_id;
            $vote->count = 1;

            if($vote->save())
            {
                $candidate = Candidate::find($candidate_id);
                $candidate->vote_count += 1;

                $candidate->save();

                return redirect()->back()->with('success', "Your vote was cast successfully!");
            }

            return redirect()->back()->with('error', "Your vote was not cast - something went wrong!");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('file');
        $filePath = $file->getRealPath();

        if (($handle = fopen($filePath, 'r')) !== FALSE) {

            fgetcsv($handle, 1000, ',');

            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                Student::updateOrCreate(
                    ['matric_number' => $data[4]],
                    [
                        'first_name' => $data[0],
                        'middle_name' => $data[1],
                        'last_name' => $data[2],
                        'institution_id' => $data[3],
                        'password' => Hash::make($data[5]),
                    ]
                );
            }

            fclose($handle);
        }

        return back()->with('success', 'CSV data imported successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
