<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => ['required'],
            'doctor_id' => ['required'],
        ]);

        $comment =Comment::create([
            'comment' => $request->comment,
            'doctor_id' => $request->doctor_id,
            'user_id' => auth()->id(),
        ]);
        return redirect('/admin');
    }
}
