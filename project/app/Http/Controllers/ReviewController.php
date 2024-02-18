<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => ['required'],
            'doctor_id' => ['required'],
        ]);

        $review = Review::create([
            'note' => $request->rating,
            'doctor_id' => $request->doctor_id,
            'user_id' => auth()->id(),
        ]);

        return redirect(route('doctor', $request->doctor_id));
    }
}
