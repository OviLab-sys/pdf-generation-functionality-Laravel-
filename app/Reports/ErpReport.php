<?php
namespace App\Reports;

use \koolreport\KoolReport;

class MyReport extends KoolReport
{
    use \koolreport\laravel\Friendship;
    use \koolreport\bootstrap4\Theme;

    public $tableName = 'profiles';

    function setup()
    {
        $this->src("mysql")
             ->query("SELECT id, school_name, phone_number, email, created_at FROM {$this->tableName}")
             ->pipe($this->dataStore("users"));
    }
}