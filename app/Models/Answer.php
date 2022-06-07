<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table="answers";
    protected $fillable=[
        // 'question_id',  
        'answer',
        'created_by',
        'count',
        'type',

    ];
    public function question()
    {
        return $this->belongsto(Question::class);
    }
    public function createdby()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }   
    public function answervotes()
    {
        return $this->hasMany(AnswerVote::class);
    }
}
