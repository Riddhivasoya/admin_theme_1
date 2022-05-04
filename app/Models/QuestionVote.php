<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionVote extends Model
{
    use HasFactory;
    protected $fillable = ['question_id', 'user_id', 'vote_type'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
