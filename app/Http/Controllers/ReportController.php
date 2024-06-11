<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reports\CompanyReport;
use \koolreport\laravel\Laravel;
use \koolreport\export\Handler;
use \koolreport\export\PDF;

class ReportController extends Controller
{
    public function generateReport()
    {
        $report = new CompanyReport;
        $report->run();

        $pdf = new PDF([
            "orientation" => "landscape", 
            "title" => "Company Report"
        ]);

        $pdf->report($report)
            ->view("reports.company_report")
            ->saveAs("report.pdf");

        return response()->download("report.pdf");
    }
}
