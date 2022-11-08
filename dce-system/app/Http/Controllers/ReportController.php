<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function export() 
    {
        return Excel::download(new ReportExport(), 'DCE_2022.xlsx');
    }

    public function storeExcel()
    {

        return Excel::store(new ReportExport(['participant, activity', 'ngo']), 'invoices.xlsx', 's3');
    }
}
