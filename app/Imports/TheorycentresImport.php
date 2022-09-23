<?php

namespace App\Imports;

use App\Models\Admin\Theorycentre;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;

class TheorycentresImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Theorycentre([
            'ref_id'     => $row['ref_id'],
            'date'       => $row['date'], 
            'centre_name'=> $row['centre_name'], 
            'buy_cost'   => $row['buy_cost'], 
            'sell_cost'  => $row['sell_cost'], 
            'account_no' => $row['account_no'], 
        ]);
    }
}
