<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; 
use App\Exports\AllUserExport; 

class ExportUserController extends Controller
{
    public function export() 
    {
        return Excel::download(new AllUserExport, 'invoices.xlsx');
    }
}
