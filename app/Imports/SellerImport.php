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
        if ($row[0] === 'CATEGORY') {
            return null;
        }
        return new seller_data([
            'CATEGORY' => $row[0],
            'SUB CATGORY' => $row[1],
            'BRAND' => $row[2],
            'CALIBER' => $row[3],
            'WEIGHT' => $row[4],
            'SKU' => $row[5],
            'REG PRICE' => $row[6],
            'SALE PRICE' => $row[7],
            'TOTAL STOCK' => $row[8],
            'VIDEO URL' => $row[9],
            'NEW ARRIVAL' => $row[10],
            'BEST SELLER' => $row[11],
            'FEATURED' => $row[12],
            'SPECS' => $row[13],
            'DESCRIPTION' => $row[14],
            'IMAGE' => $row[15],
          

        ]);
    }
}