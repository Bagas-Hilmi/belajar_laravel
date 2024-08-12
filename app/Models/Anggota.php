<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model {
    public $table = 'anggota';

    public function hadiah()
    {
        
    	return $this->belongsToMany('App\Models\Hadiah');
    }   
    }   

