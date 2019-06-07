@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('title')
    Dashboard
@endsection
@section('content')

    <div class="row">
        <div class="col-xl-3">
            <a href="{{url('/admin/learners')}}">
            <div class="card-box widget-chart-one gradient-danger bx-shadow-lg">
                <div class="float-left"><i class="fa fa-users fa-5x text-white"></i></div>
                <div class=" text-center"><p class="text-white mb-0 mt-2">
                        Learners</p>
{{--                    <h3 class="text-white">{{$members->count() ?? ''}}</h3></div>--}}
                    <h3 class="text-white">2</h3></div>
            </div>
            </a>
        </div><!-- end col -->
        <div class="col-xl-3">
            <a href="{{url('/admin/courses')}}">
            <div class="card-box widget-chart-one gradient-info bx-shadow-lg">
                <div class="float-left"><i class="fa fa-line-chart fa-5x text-white"></i></div>
                <div class="text-center"><p class="text-white mb-0 mt-2">
                        Courses</p>
                    <h3 class="text-white">5</h3></div>
            </div>
            </a>
        </div><!-- end col -->
        <div class="col-xl-3">
            <a href="{{url('/admin/units')}}">
            <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
                <div class="float-left"><i class="fa fa-table fa-5x text-white"></i></div>
                <div class="text-center"><p class="text-white mb-0 mt-2">
                        Course Units</p>
                    <h3 class="text-white">12</h3></div>
            </div>
            </a>
        </div><!-- end col -->
        <div class="col-xl-3">
            <div class="card-box widget-chart-one gradient-info bx-shadow-lg">
                <div class="float-left clearfix"><i class="fa fa-list fa-5x text-white"></i></div>
                <div class=" text-center"><p class="text-white mb-0 mt-2">
                        Active Users</p>
                    <h3 class="text-white">1</h3></div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                                <div class="clearfix"></div>
                <!-- fetch courses -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="datatable">
                        <thead class="bg-info text-center text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Learner Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">National ID</th>
                            <th scope="col">IHRM No.</th>
                            <th scope="col">Date Joined</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @foreach($members as $i=>$member)--}}
{{--                            <tr>--}}
{{--                                <td>{{$i+1}}</td>--}}
{{--                                <td>{{$member->fname ?? ''}}</td>--}}
{{--                                <td>{{$member->email ?? ''}}</td>--}}
{{--                                <td>{{$member->phone ?? ''}}</td>--}}
{{--                                <td>{{$member->nid ?? ''}}</td>--}}
{{--                                <td>{{$member->ihrm_no ?? ''}}</td>--}}

{{--                                <td>{{date('Y-m-d',strtotime($member->created_at)) ?? ''}}</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}

                        </tbody>
                    </table>
                </div><!--end responsive table-->

            </div>
        </div>
    </div>

@endsection
