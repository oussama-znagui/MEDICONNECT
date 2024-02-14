<?php

namespace App\Http\Controllers;

use App\Models\Medicin;
use Illuminate\Http\Request;

class MedicinController extends Controller
{
    //


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'medicin' => ['required'],
            'specialty_id' => ['required'],
        ]);

        $medicin = Medicin::create($validatedData);
        return redirect('/admin');
    }
}
