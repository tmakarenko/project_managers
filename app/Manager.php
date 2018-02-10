<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = ['name','email','phone','company','photo_link'];

    public function projects(){
    	return $this->belongsToMany('App\Project');
    }
}
