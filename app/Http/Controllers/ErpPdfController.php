<?php

namespace App\Http\Controllers;

use App\Reports\MyReport;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class ErpPdfController extends Controller
{
    public function showProfilesReport()
    {
        $report = new MyReport;
        $report->run();

        $profiles = $report->dataStore('users')->toArray();
        $tableName = $report->tableName;
        $currentDate = Carbon::now()->format('Y-m-d');
        $header = "$tableName Report as at $currentDate";

        $pdf = PDF::loadView('erpPdf', compact('profiles', 'header'))
                ->setPaper('a4', 'landscape');
        return $pdf->download('profiles report.pdf');
    }
}
