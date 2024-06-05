<?php

namespace App\Http\Controllers;

use App\Reports\SalesByCustomer;
use App\Reports\SalesByCountry;
use Illuminate\Http\Request;

class CustomerProductDollarSaleController extends Controller
{
    public function index () {
        $report = new SalesByCustomer;
        $report->run();
        return view("report",["report"=>$report]);
    }

    public function indexCountry () {
        $report = new SalesByCountry;
        $report->run();
        return view("report",["report"=>$report]);
    }
}
