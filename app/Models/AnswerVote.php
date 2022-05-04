<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerVote extends Model
{
    use HasFactory;
    protected $fillable = ['answer_id', 'user_id', 'vote_type'];    

    public function replyvote($replyid)
    {
        return $this->where('answer_id','=',$replyid)->where('user_id','=',auth()->id())->get();
    }
}
