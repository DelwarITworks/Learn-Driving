<?php

namespace App\Exports;

use App\Models\Centre;
use Maatwebsite\Excel\Concerns\FromCollection;

class CentresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Centre::select("ref_id","date","centre_name","buy_cost","sell_cost","account_no",);
    }



    public function headings(): array
    {
        return ["Booking Ref No", "Test Date", "Test Center", "Buying Cost", "Sell Amount", "Account No"];
    }
}
