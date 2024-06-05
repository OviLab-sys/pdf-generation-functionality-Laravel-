<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Reports\MyReport;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
        // Initialize the report
        $report = new MyReport;
        $report->run();

        // Get the data from the report
        $data = $report->dataStore('users')->toArray();

        // Pass the data to the view
        $pdf = PDF::loadView('pdf', ['data' => $data]);

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
