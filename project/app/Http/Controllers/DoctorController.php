<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Auth()->user());
        return view('profilDoctor', [
            "doctor" => Doctor::with('user', 'specialty')->get(),


        ]);
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
    public function show(Doctor $doctor)
    {
        $d = $doctor->id;
        $doctor = Doctor::whereId($doctor->id)->get();
        $comments = Comment::where('doctor_id', $d)->with('user')->get();

        return view('doctor', [
            "doctor" => $doctor,
            "comments" => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
