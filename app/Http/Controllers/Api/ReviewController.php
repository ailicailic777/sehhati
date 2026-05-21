<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $validated['patient_id'] = $request->user()->patient->id;

        $review = Review::create($validated);

        $doctor = $review->doctor;
        $doctor->rating = $doctor->reviews()->avg('rating');
        $doctor->save();

        return response()->json($review, 201);
    }
}
