<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'sent_survey_id',
        'question_id',
        'answer_rating',
        'answer_text'
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function sentSurvey(): BelongsTo
    {
        return $this->belongsTo(SentSurvey::class);
    }
}
