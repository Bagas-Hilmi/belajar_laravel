<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table = "book";

    protected $fillable = ['asset','subnumber','posting_date','document_number','reference_key','material','business_area','document_type','posting_key','note','profit_center','wbs_element','order','purchasing_document','quantity','base_unit','assignment'];
}
