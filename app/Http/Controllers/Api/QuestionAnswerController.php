<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QuestionAnswer;
use Illuminate\Http\Request;

class QuestionAnswerController extends Controller
{
    public function index(Request $request)
    {
        $qa = QuestionAnswer::with('user')
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->json($qa);
    }

    public function show($id)
    {
        $qa = QuestionAnswer::with('user')->findOrFail($id);
        $qa->increment('views_count');

        return response()->json($qa);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_ar' => 'required|string',
            'question_en' => 'nullable|string',
            'question_fr' => 'nullable|string',
        ]);

        $validated['user_id'] = $request->user()->id;

        return response()->json(QuestionAnswer::create($validated), 201);
    }
}
