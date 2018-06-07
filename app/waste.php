<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class waste extends Model
{
    public $table = "waste";


    public function posts(){
        return $this->hasMany('App\posts');
    }
}
