<!DOCTYPE html>
<html>
<head>
    <title>Company Report</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .header, .footer {
            width: 100%;
            text-align: center;
        }
        .header {
            position: fixed;
            top: 0;
        }
        .footer {
            position: fixed;
            bottom: 0;
        }
    </style>
</head>
<body>
    <?php
    $data = $this->dataStore("company_report")->get(0);
    ?>
    <div class="header">
        <h1><?php echo $data["header"]; ?></h1>
    </div>
    <div class="footer">
        <p><?php echo $data["footer"]; ?></p>
    </div>
</body>
</html>
