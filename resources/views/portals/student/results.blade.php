@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Exam Results</li>
@endsection
@section('title')
   Provisional results
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="float-right mb-3">
                    <a href="{{url('portal/student/slip')}}" class="btn btn-success waves-effect waves-light" ><i class="fa fa-fw fa-print"></i>Print Results
                    </a>
                </div>
                <div class="clearfix"></div>
                <!-- fetch courses -->
                <div class="table-responsive">
                    <table class="table table-bordered">
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
                </div><!--end responsive table-->

            </div>
        </div>
    </div>
@endsection
