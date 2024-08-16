<?php

namespace App\Imports;

use App\Models\book;
use Maatwebsite\Excel\Concerns\ToModel;

class BookImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new book([
        'asset' => $row[0],
        'subnumber' => $row[1],
        'posting_date' => $row[2],
        'document_number' => $row[3],
        'reference_key' => $row[4],
        'material' => $row[5],
        'business_area' => $row[6],
        'document_type' => $row[7],
        'posting_key' => $row[8],
        'note','profit_center' => $row[9],
        'wbs_element' => $row[10],
        'order' => $row[11],
        'purchasing_document' => $row[12],
        'quantity' => $row[13],
        'base_unit' => $row[14],
        'assignment' => $row[15],
        ]);
    }
}
