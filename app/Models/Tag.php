<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=['tag_name',
];

public function getTagNameAttribute()
            {
                return ucfirst($this->attributes['tag_name']);
            }
            public function setTagNameAttribute($value)
            {
                return $this->attributes['tag_name'] = ucfirst($value);
            }

}
