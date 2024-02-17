<?php

namespace App\Http\Controllers;

use App\Models\Favorie;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class FavorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function addToFavorie(Doctor $doctor)
    {
        Favorie::create([
            'user_id' => Auth::id(),
            'doctor_id' => $doctor->id,
        ]);

        return redirect(route('specialty', $doctor->specialty->id));
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
    public function show(Favorie $favorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorie $favorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorie $favorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorie $favorie)
    {
        //
    }
}
