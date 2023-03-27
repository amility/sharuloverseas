<?php

namespace App\Imports;

use App\Models\seller_data;
use Maatwebsite\Excel\Concerns\ToModel;

class SellerImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new seller_data([
            'NAME' =>$row[0],
            'CATEGORY' => $row[1],
            'SUB CATGORY' => $row[2],
            'BRAND' => $row[3],
            'CALIBER' => $row[4],
            'WEIGHT' => $row[5],
            'SKU' => $row[6],
            'REG PRICE' => $row[7],
            'SALE PRICE' => $row[8],
            'TOTAL STOCK' => $row[9],
            'VIDEO URL' => $row[10],
            'NEW ARRIVAL' => $row[11],
            'BEST SELLER' => $row[12],
            'FEATURED' => $row[13],
            'STATUS' => $row[14],
            'SPECS' => $row[15],
            'DESCRIPTION' => $row[16],
            'IMAGE' => $row[17],
          

        ]);
    }
}