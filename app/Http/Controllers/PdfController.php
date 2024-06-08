<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Reports\MyReport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
        $report = new MyReport();
        $tableName = $report->tableName;

        // Fetch the data from the selected table
        $data = DB::table($tableName)->get()->toArray();

        // Get the current date without time
        $currentDate = date('F j, Y');

        // Generate the header string
        $header = ucfirst($tableName) . ' Report as at ' . $currentDate;

        // Load the report data using MyReport class
        $report->run();

        // Pass the data and header to the view
        $pdf = PDF::loadView('pdf', [
            'data' => $data,
            'header' => $header
        ]);

        // Customize PDF settings
        $pdf->setPaper('a4', 'landscape');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'isRemoteEnabled' => true,
            'isFontSubsettingEnabled' => true,
        ]);

        // Store the PDF temporarily
        $fileName = 'report.pdf';
        $path = storage_path('app/public/' . $fileName);
        $pdf->save($path);

        // Check if the request is for download
        if ($request->has('download')) {
            return response()->download($path)->deleteFileAfterSend(true);
        } else {
            return response()->file($path);
        }
    }
}
