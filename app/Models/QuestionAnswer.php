<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $fillable = [
        'user_id', 'question_ar', 'question_en', 'question_fr',
        'answer_ar', 'answer_en', 'answer_fr',
        'is_answered', 'is_featured', 'views_count',
    ];

    protected $casts = [
        'is_answered' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
