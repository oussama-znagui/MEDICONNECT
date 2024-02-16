<?php

namespace App\Http\Controllers;

use App\Models\Medicin;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{


    public function index()
    {
        return view('admin', [
            "specilty" => Specialty::all(),
            "medicins" => Medicin::all(),
        ]);
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'specialty' => ['required'],
        ]);
        $specilty = Specialty::create($validatedData);
        return redirect('/admin');
    }
    public function destroy(Specialty $specialty)
    {

        $specialty->delete();
        return back();
    }

    public function update(Request $request, Specialty $specialty)
    {
        // dd($request['specialty']);
        $validatedData = $request->validate([
            'specialty' => ['required'],
        ]);

        $specialty->update($validatedData);
        return back();
    }

    public function show(Specialty $specialty)
    {
        $specialty = $specialty->load('doctors');

        return view('specialty', [
            "specialty" => $specialty,
        ]);
    }
}
