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
                            <th scope="col">#</th>
                            <th>Exam type</th>
                            <th>Exam</th>
                            <th>Unit</th>
                            <th>Batch</th>
                            <th>Total Marks</th>
                            <th>Exam date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($units as $key=>$unit)
                            @foreach($unit->exams()->get() as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->exam_type->name ?? '' }}</td>
                                    <td>{{ $row->name ?? ''}}</td>
                                    <td>{{ $row->unit->name ?? ''}}</td>
                                    <td>{{ $row->batch->name ?? ''}}</td>
                                    <td>{{ $row->total_marks ?? ''}}</td>
                                    <td>{{ $row->exam_date }}</td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                           data-target="#delete-modal-{{ $row->id }}"><i class=" fa fa-fw fa-trash"></i></a>
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
