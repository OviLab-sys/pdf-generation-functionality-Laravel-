<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Sales Report</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .logo {
            color: orange;
            margin-bottom: 10px; /* Add space between logo and theme */
        }
        .theme {
            color: darkblue;
            margin-bottom: 10px; /* Add space between theme and button */
        }
        .generate-pdf-button {
            background-color: #e8b337;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none; /* Remove underline from link */
        }
    </style>
</head>
<body>
    <header class="header-container">
        <h1 class="logo">Learnsoft Beliotech Solutions Limited</h1>
        <h3 class="theme">Financial Sales Report</h3>
        <a href="{{ url('/financialpdf') }}" class="generate-pdf-button">Generate PDF</a>
    </header>
</body>
</html>
