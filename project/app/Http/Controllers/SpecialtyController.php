<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{


    public function index()
    {
        return view('admin', ["specilty" => Specialty::all()]);
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'specialty' => ['required'],
        ]);
        $specilty = Specialty::create($validatedData);
        return redirect('/admin');
    }
}
