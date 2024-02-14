<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialtyController extends Controller
{


    public function store(Request $request)
    {
        dd();
        $validatedData = $request->validate([
            'specialty' => ['required'],

        ]);
    }
}
