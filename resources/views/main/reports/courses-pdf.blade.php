<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Courses Report</title>
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

        /* Clear floats after the columns */
        .header:after {
            content: "";
            display: table;
            clear: both;
            margin-bottom: 130px;
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
    <div class="column left">
        <img src="{{ asset('assets/images/logo22.PNG') }}" style="width:140px;height:140px;">
    </div>
    <div class="column right">
        <h3 class="title">INSTITUTE OF CERTIFIED HUMAN RESOURCE MANAGERS</h3>
        <h4 class="info">
            17th Floor,Regus Suites,ICEA,<br>
            Kenyatta Avenue,Nairobi,Kenya<br>
            P.O Box 18582-00100, Nairobi<br>
            Tel:020 515<br>
            E-mail:info@ichrm.org Website:http://www.ichrm.org
            <br>
        </h4>
    </div>
    {{--<div class="column right">--}}
    {{--<img src="{{ asset('assets/images/logo22.PNG') }}" style="width:140px;height:140px;">--}}
    {{--</div>--}}

</div>
<hr style="color: #716DEE; border-bottom: 1px solid #716DEE;">
<h6 style="margin-bottom: 100px;">&nbsp;&nbsp;</h6>

<table id="layout">
    <caption>Course Learners Report</caption>
    <br>
    <caption class="cap">Course Unit : {{$course}} </caption>
    <br>
    <caption class="cap1">From: {{$start ?? ''}} to {{$end ?? ''}} </caption>
    <thead>
    <tr>
        <th>S/No.</th>
        <th>Course</th>
        <th>Course Unit</th>
        <th>Learner Name</th>
        <th>IHRM No.</th>
        <th>Date Enrolled</th>
    </tr>
    </thead>
    <tbody>
    @foreach($members as $i=>$member)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$member->unit->course->name ?? ''}}</td>
            <td>{{$member->unit->name ?? ''}}</td>
            <td>{{$member->member->fname ?? ''}}</td>
            <td>{{$member->member->ihrm_no ?? ''}}</td>
            <td>{{date('d-M-Y',strtotime($member->created_at)) ?? ''}}</td>
        </tr>
    @endforeach

    </tbody>
</table>

</body>
</html>

