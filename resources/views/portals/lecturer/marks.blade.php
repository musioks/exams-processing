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

                    <form action="{{ url('/portal/lecturer/exams/'.$exam->id) }}" method="post">
                       @csrf
                        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ADMISSION No.</th>
                                <th>NAME</th>
                                <th>SCORE</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($students as $i=> $student)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $student->admission_no }} <input type="hidden" name="student_id[]" value="{{ $student->id }}"></td>
                                    <td>{{ $student->firstname }} {{ $student->middlename }} {{ $student->surname }}</td>
                                    <td><input type="text" name="score[]" class="form-control" min="0" max="100" placeholder="enter score"></td>
                                </tr>
                            @empty
                                <p>No Data Found</p>
                            @endforelse
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary float-right mr-4">Submit Marks</button>
                    </form>
                </div><!--end responsive table-->

            </div>
        </div>
    </div>
@endsection
