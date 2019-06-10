@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('/portal/lecturer/exams')}}">Exams</a></li>
    <li class="breadcrumb-item active">submit Marks</li>
@endsection
@section('title')
    Submit Marks
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="clearfix"></div>
                <!-- fetch courses -->
                <h4><span class="text-success">Unit Name: {{$exam->unit->name}}</span>   |   Exam: {{$exam->name}}  </h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>CLASS</th>
                            <th>ADMISSION No.</th>
                            <th>NAME</th>
                            <th>SCORE/{{$exam->total_marks}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $i=> $slip)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $slip->batch ?? ''}}</td>
                                <td>{{ $slip->adm ?? '' }}</td>
                                <td>{{ $slip->firstname ?? '' }} {{ $slip->surname ?? ''}}</td>
                                <td>{{ $slip->score ?? ''}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!--end responsive table-->

            </div>
        </div>
    </div>
@endsection
