<?php
namespace App\Reports;

use \koolreport\KoolReport;
use \koolreport\laravel\Friendship;

class CompanyReport extends KoolReport
{
    use Friendship;

    public function setup()
    {
        $this->src('mysql')
            ->query("SELECT company, contact, header, footer FROM company_report WHERE id = 1")
            ->pipe($this->dataStore('company_report'));
    }
}
