<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','price','executor','execution_start_date','execution_end_date'];

    public function managers(){
    	return $this->belongsToMany('App\Manager');
    }
}
