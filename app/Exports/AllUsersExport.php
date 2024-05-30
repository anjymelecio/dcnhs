<?php

namespace App\Exports;
use App\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllUsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //

        return view('admin.allusers', [

            'invoices' => Invoice::all()
        ]);
    }
}
