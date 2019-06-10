@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Exams</li>
@endsection
@section('title')
    My Exams
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="clearfix"></div>
                <!-- fetch courses -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="datatable">
                        <thead class="thead-light">
                        <tr>
                            <th>Exam type</th>
                            <th>Exam</th>
                            <th>Unit Name</th>
                            <th>Batch Name</th>
                            <th>Total Marks</th>
                            <th>Exam date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($units as $unit)
                            @foreach($unit->exams()->get() as $row)
                                <tr>
                                    <td>{{ $row->exam_type->name ?? '' }}</td>
                                    <td>{{ $row->name ?? ''}}</td>
                                    <td>{{ $row->unit->name ?? ''}}</td>
                                    <td>{{ $row->batch->name ?? ''}}</td>
                                    <td>{{ $row->total_marks ?? ''}}</td>
                                    <td>{{ $row->exam_date }}</td>
                                    <td>
                                        <a href="{{url('/portal/lecturer/exams/'.$row->id)}}" class="btn btn-primary btn-xs">Submit Marks</a>
                                        <a href="{{url('/portal/lecturer/exams/'.$row->id.'/results')}}" class="btn btn-success btn-xs">View Scores</a>
                                    </td>

                                </tr>

                            @endforeach
                        @empty
                            <p>No Data Found</p>
                        @endforelse
                        </tbody>
                    </table>
                </div><!--end responsive table-->

            </div>
        </div>
    </div>
@endsection
