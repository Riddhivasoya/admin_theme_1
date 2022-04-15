<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table= "customers";
    protected $fillable = [
        'first_name', 
        'last_name',
        'birthdate',
        'email',
        'address',
        'gender',
        'hobby',  
        'image',
       // 'profession'


    ];
    
    protected $appends = ['full_name'];


            public function getFirstNameAttribute()
            {
                return ucfirst($this->attributes['first_name']);
            }
            public function setFirstNameAttribute($value)
            {
                return $this->attributes['first_name'] = ucfirst($value);
            }

            public function getLastNameAttribute()
            {
                return ucfirst($this->attributes['last_name']);
            }
            public function setLastNameAttribute($value)
            {
               return $this->attributes['last_name'] = ucfirst($value);
               
            }

            // public function setbirthdateAttribute($value) {
            //     $this->attributes['birthdate'] = Carbon::parse($value)->format('d-m-Y');
            // }

            protected function getFullNameAttribute()
            {
                return ucfirst( $this->attributes['first_name'] . ' ' .  ucfirst($this->attributes['last_name']));
            }
            // public function birthdate(): Attribute   
            //     {
            //         return new Attribute(
            //             get: fn ($value) =>  $value->format('m/d/Y'),
            //             set: fn ($value) =>  $value->format('Y/m/d'),
            //         );
            //     }


            // Get the phone record associated with the user.

            //  public function locations()
            // {
            // return $this->hasOne('locations::class');
            // }

            public function mobile()
            {
                return $this->hasOne(Mobile::class,'customer_id','id');
            }

            // public function post()
            // {
            //     return $this->hasMany(Post::class,'customer_id','id');
            // }
           
    }


