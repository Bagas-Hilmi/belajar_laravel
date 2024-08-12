<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model {
    public $table = 'hadiah';

    public function anggota()
    {
    	return $this->belongsToMany('App\Anggota');
    }
}
