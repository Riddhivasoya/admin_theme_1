<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table="answers";
    protected $fillable=[
        'question_id',  
        'answer',
        'created_by',

    ];
    public function question()
    {
        return $this->belongstoMany(Question::class);
    }
    public function createdby()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
