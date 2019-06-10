<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Result Slip</title>
    <style>
        #layout {
            border-collapse: collapse;
            width: 100%;
            caption-side: top;
            margin-top: -100px;
        }

        #layout td, #layout th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #layout tr:hover {
            background-color: #ddd;
        }

        #layout th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0D13F5;
            color: #ffffff;
        }

        caption {
            font-size: 26px;
            font-weight: bold;
            color: #222222;
            padding: .2em .8em;
        }

        caption.cap {
            font-size: 16px;
            font-weight: bold;
            color: #000000;
            padding: .2em .8em;
        }

        .column {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            width: 100%;
            float: left;
            padding: 8px;
            height: 5px; /* Should be removed. Only for demonstration */
        }

        .left {
            width: 10%;
            text-align: center;
            margin-left: 15px;
        }

        .right {
            width: 90%;
            text-align: right;
        }

        .header {
            text-align: center;
        }

        /* Clear floats after the columns */
        .header:after {
            content: "";
            display: table;
            clear: both;
            margin-bottom: 40px;
        }

        .title {
            color: #0D13F5;
            font-weight: 700;
            margin-right: 40px;
            margin-bottom: -20px;
        }

        .info {
            color: #0D13F5;
            font-weight: 900;
            margin-right: 40px;
        }
    </style>

</head>
<body>
<div class="header">

    <h2>Name: {{$student->full_name}} | Admission No. {{$student->admission_no}}</h2>

</div>
<hr style="color: #716DEE; border-bottom: 1px solid #716DEE;">
<h6 style="margin-bottom: 100px;">&nbsp;&nbsp;</h6>

<table id="layout">
    <caption>Provisional Results</caption>
    <br>
    <caption class="cap">Course : {{$student->course->name}} </caption>
    <br>
    <thead>
    <tr>
        <th>#</th>
        <th>UNIT NAME</th>
        <th>SCORE</th>
    </tr>
    </thead>
    <tbody>
    @foreach($results as $i=> $slip)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $slip->exam->unit->name ?? ''}}</td>
            <td>{{ $slip->score ?? ''}}</td>

        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>

