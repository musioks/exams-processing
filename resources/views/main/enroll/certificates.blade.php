@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('/admin/learners')}}">Learners</a></li>
    <li class="breadcrumb-item active">Certificates</li>
@endsection
@section('title')
    {{$member->fname ?? 'Learner'}} | Certificates
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <ul class="nav nav-pills navtab-bg border-bottom border-primary pb-1 ">
                    <li class="nav-item">
                        <a href="{{url('/admin/learners/view/'.$member->id)}}" aria-expanded="false"
                           class="nav-link">Learner details</a></li>
                    <li class="nav-item">
                        <a href="{{url('/admin/learners/enroll/'.$member->id)}}" aria-expanded="false"
                           class="nav-link ">Enroll</a></li>
                    <li class="nav-item"><a href="{{url('main'.$member->id)}}"
                                            aria-expanded="true"
                                            class="nav-link">Course Units</a></li>
                    <li class="nav-item"><a href="{{url('/admin/learners/payments/'.$member->id)}}" aria-expanded="true"
                                            class="nav-link">Payments</a></li>
                    <li class="nav-item"><a href="{{url('/admin/learners/certificates/'.$member->id)}}"
                                            aria-expanded="true"
                                            class="nav-link active">Certificates</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Description</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $i=>$course)
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$course->course ?? ''}}</td>
                                        <td>{{$course->course_description ?? ''}}</td>
                                        <td>
                                            <a href="{{url('admin/learners/certificate/'.$course->course_id.'/download')}}"
                                               class="btn btn-success btn-sm">Download Certificate</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

