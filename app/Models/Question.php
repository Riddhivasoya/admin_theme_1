<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;



class Question extends Model

{
    use HasFactory;
    // use \Conner\Tagging\Taggable;
    protected $fillable = ['title', 
                            'body',
                            'created_by',
                            'count'
                        ];

    public function tag()
    {
        return $this->belongsToMany(Tag::class,'question_tag','question_id','tag_id');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class,'question_id','id');
    }
    public function createdby()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function qview()
    {
        return $this->hasMany(View::class,'question_id','id');
    }
    public function questionvotes()
    {
        return $this->hasMany(QuestionVote::class);
    }

}   
