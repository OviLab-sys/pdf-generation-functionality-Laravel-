<?php
namespace App\Reports;

use \koolreport\processes\CalculatedColumn;
use \koolreport\processes\ColumnMeta;

class SalesByCountry extends \koolreport\KoolReport
{
    public function settings()
    {
        return array(
            "dataSources"=>array(
                "automaker"=>array(
                    "connectionString"=>"mysql:host=localhost;dbname=kool_reports",
                    "username"=>"root",
                    "password"=>"cash",
                    "charset"=>"utf8",
                )
            )
        );
    }


    public function setup()
    {
        $this->src("mysql")
            ->query("
            select customers.country,sum(orderdetails.quantityOrdered*orderdetails.priceEach) as amount
            from orders
            join orderdetails on orderdetails.orderNumber = orders.orderNumber
            join customers on customers.customerNumber = orders.customerNumber
            group by customers.country
        ")
            ->pipe(new CalculatedColumn(array(
                "tooltip"=>"'{country} : $'.number_format({amount})",
            )))
            ->pipe(new ColumnMeta(array(
                "tooltip"=>array(
                    "type"=>"string",
                )
            )))
            ->pipe($this->dataStore("sales"));
    }
}
