<?php

namespace App\Models; // Pastikan namespace sesuai dengan lokasi file

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function tags(){
    	return $this->hasMany('App\Models\Tag');
    }
}
