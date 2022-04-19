<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model

{
    use HasFactory;
    // use \Conner\Tagging\Taggable;
    protected $fillable = ['title', 
                            'body',
                        ];

    public function tag()
    {
    return $this->belongsToMany(Tag::class,'question_tag','question_id','tag_id');
    }
}   
