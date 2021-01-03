<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'job_cat',


    ];
    // protected $primaryKey = 'id';

    public function catposts(){
        return $this->hasMany('App\JobPost');
    }

    
}
