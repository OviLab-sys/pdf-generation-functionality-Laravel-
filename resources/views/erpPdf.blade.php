<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $header }}</title>
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
            height: 50px; /* Adjust height to fit the text */
            background-color: #dcd9d1;
            color: rgb(12, 6, 6);
            text-align: center;
            border-bottom: 1px solid black;
            box-sizing: border-box;
            line-height: 50px; /* Vertically center the text */
        }
        header h2 {
            margin: 0;
            padding: 0;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40px;
            background-color: white;
            color: rgb(6, 0, 0);
            text-align: center;
            line-height: 40px;
            padding: 0; /* Remove padding to avoid overflow */
        }
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }
        .content {
            margin-top: 0px; 
            margin-bottom: 100px;
        }
        .page {
            position: relative;
            /* Removed page-break-after property */
        }
        .page-number {
            color: rgb(6, 0, 0);
            font-size: 15px;
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
    </style>
</head>
<body>
    <header>
        <h2>{{ $header }}</h2>
    </header>
    @php
        $chunks = array_chunk($profiles, 50);
    @endphp
    @foreach($chunks as $index => $chunk)
        <div class="page">
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            @if(!empty($chunk) && count($chunk) > 0)
                                @foreach(array_keys((array) $chunk[0]) as $column)
                                    <th>{{ $column }}</th>
                                @endforeach
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chunk as $row)
                            <tr>
                                @foreach((array) $row as $cell)
                                    <td>{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer>
                <div class="footer-content">
                    <div class="page-number">Page {{ $index + 1 }} of {{ count($chunks) }}</div>
                    <p>&copy; Learnsoft 2024</p>
                </div>
            </footer>
        </div>
    @endforeach
</body>
</html>
