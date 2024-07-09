<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Election;
use App\Models\Student;
use App\Models\Institution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutions = Institution::count();
        $elections = Election::count();
        $students = Student::count();
        return view('dashboard', compact('institutions', 'elections', 'students'));
    }

    public function login(Request $request)
    {
        // Validate the login form
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log in the admin
        if (Auth::guard('admin')->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ])) {
            // Redirect to admin dashboard
            return redirect()->intended('/dashboard');
        }

        // Authentication failed, redirect back to the login form with an error message
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('username'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
