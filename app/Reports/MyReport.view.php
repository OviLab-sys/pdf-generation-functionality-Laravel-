<?php
use \koolreport\widgets\koolphp\Table;
?>
<html>
    <head>
    <title>My Report</title>
    </head>
    <body>
        <h1></h1>
        <?php
        Table::create([
            "dataSource"=>$this->dataStore("users")
        ]);
        ?>
    </body>
</html>