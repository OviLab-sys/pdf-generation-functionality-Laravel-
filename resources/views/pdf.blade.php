<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Sales Report</title>
    <style>
        @page {
            margin: 70px 25px; 
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            position: fixed;
            top: -70px; 
            left: 0;
            right: 0;
            height: 60px;
            background-color: #dcd9d1;
            color: rgb(12, 6, 6);
            text-align: center;
            line-height: 60px; 
            border-bottom: 2px solid #011e20; 
            padding: 10px;
        }
        footer {
            position: fixed;
            bottom: -50px; 
            left: 0;
            right: 0;
            height: 40px;
            background-color: #ffffff;
            color: rgb(6, 0, 0);
            text-align: center;
            line-height: 40px; 
            padding: 10px;
        }
        .page-number {
            position: fixed;
            bottom: -30px; 
            left: 0;
            right: 0;
            height: 20px;
            text-align: center;
            color: rgb(6, 0, 0);
            line-height: 20px;
        }
        .content {
            margin-top: 80px; 
            margin-bottom: 100px; 
        }
        .page:last-child .content {
            page-break-after: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed; 
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            padding: 12px;
            word-wrap: break-word; 
        }
        td {
            padding: 10px;
            text-align: left;
            word-wrap: break-word; 
        }
        .page-number:before {
            content: counter(page);
        }
    </style>
</head>
<body>
    <header>
        <h2>Learnsoft Financial Report</h2>
    </header>
    <footer>
        <p>&copy; Learnsoft 2024</p>
    </footer>
    <div class="page-number">
        <span class="page-number"></span>
    </div>
    @php
        $chunks = array_chunk($data, 50); 
    @endphp
    @foreach($chunks as $chunk)
        <div class="page">
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            @if(!empty($chunk) && count($chunk) > 0)
                                @foreach(array_keys($chunk[0]) as $column)
                                    <th>{{ $column }}</th>
                                @endforeach
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chunk as $row)
                            <tr>
                                @foreach($row as $cell)
                                    <td>{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</body>
</html>
