@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('title')
    Dashboard
@endsection
@section('content')
    @role('ADMIN')
    <div class="row">
        <div class="col-xl-3">
            <a href="{{url('/academics/batches')}}">
                <div class="card-box widget-chart-one gradient-danger bx-shadow-lg">
                    <div class="float-left"><i class="fa fa-list fa-5x text-white"></i></div>
                    <div class=" text-center"><p class="text-white mb-0 mt-2">
                            Batches</p>
                        {{--                    <h3 class="text-white">{{$members->count() ?? ''}}</h3></div>--}}
                        <h3 class="text-white">{{$batches}}</h3></div>
                </div>
            </a>
        </div><!-- end col -->
        <div class="col-xl-3">
            <a href="{{url('/academics/courses')}}">
                <div class="card-box widget-chart-one gradient-info bx-shadow-lg">
                    <div class="float-left"><i class="fa fa-line-chart fa-5x text-white"></i></div>
                    <div class="text-center"><p class="text-white mb-0 mt-2">
                            Courses</p>
                        <h3 class="text-white">{{$courses}}</h3></div>
                </div>
            </a>
        </div><!-- end col -->
        <div class="col-xl-3">
            <a href="{{url('/academics/units')}}">
                <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
                    <div class="float-left"><i class="fa fa-table fa-5x text-white"></i></div>
                    <div class="text-center"><p class="text-white mb-0 mt-2">
                            Units</p>
                        <h3 class="text-white">{{$units}}</h3></div>
                </div>
            </a>
        </div><!-- end col -->
        <div class="col-xl-3">
            <div class="card-box widget-chart-one gradient-info bx-shadow-lg">
                <div class="float-left clearfix"><i class="fa fa-list fa-5x text-white"></i></div>
                <div class=" text-center"><p class="text-white mb-0 mt-2">
                        Active Users</p>
                    <h3 class="text-white">{{$users}}</h3></div>
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
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Admission No.</th>
                            <th scope="col">Email</th>
                            <th scope="col">National ID</th>
                            <th scope="col">Mobile No.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$student->fullname ?? ''}}</td>
                                <td>{{$student->gender ?? ''}}</td>
                                <td>{{$student->admission_no ?? ''}}</td>
                                <td>{{$student->email ?? ''}}</td>
                                <td>{{$student->national_id ?? ''}}</td>
                                <td>{{$student->mobile_no ?? ''}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!--end responsive table-->

            </div>
        </div>
    </div>
    @endrole
    @role('STUDENT')
    @php
        $student=Auth::user()->student()->first();
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">FirstName</label>
                            <input type="text" class="form-control" name="firstname"
                                   value="{{$student->firstname ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">MiddleName</label>
                            <input type="text" class="form-control"
                                   name="middlename"
                                   value="{{$student->middlename ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">LastName</label>
                            <input type="text" class="form-control" name="lastname"
                                   value="{{$student->surname ?? ''}}">
                        </div>
                    </div>
                </div><!-- end row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           id="datepicker-autoclose" name="dob"
                                           value="{{$student->dob ?? 'YYYY-MM-DD'}}"
                                           autocomplete="off">
                                    <span class="input-group-addon bg-custom b-0"><i
                                                class="mdi mdi-calendar text-white"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">National ID <span class="text-danger">*</span></label>
                            <input type="number" class="form-control"
                                   name="national_id"
                                   value="{{$student->national_id ?? ''}}">
                        </div>
                    </div>
                </div><!-- end row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Mobile Number</label>
                            <input type="text" class="form-control"
                                   name="mobile_no"
                                   value="{{$student->mobile_no ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Email Address</label>
                            <input type="text" class="form-control" name="email"
                                   value="{{$student->email ?? ''}}">
                        </div>
                    </div>
                </div><!-- end row -->
            </div>
        </div>
    </div>
    @endrole
    @role('LECTURER')
    @php
        $lecturer=Auth::user()->lecturer()->first();
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">FirstName</label>
                            <input type="text" class="form-control" name="firstname" value="{{$lecturer->firstname ?? ''}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">MiddleName</label>
                            <input type="text" class="form-control" name="middlename" value="{{$lecturer->middlename ?? ''}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">LastName</label>
                            <input type="text" class="form-control" name="lastname" value="{{$lecturer->lastname ?? ''}}" disabled>
                        </div>
                    </div>
                </div><!-- end row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Gender</label>
                            <select name="gender" class="form-control" disabled>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           id="datepicker-autoclose" name="dob" value="{{$lecturer->dob ?? 'YYYY-MM-DD'}}" autocomplete="off" disabled>
                                    <span class="input-group-addon bg-custom b-0"><i
                                                class="mdi mdi-calendar text-white"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">National ID </label>
                            <input type="number" class="form-control" name="national_id" value="{{$lecturer->national_id ?? ''}}" disabled>
                        </div>
                    </div>
                </div><!-- end row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Postal Address</label>
                            <input type="text" class="form-control"  name="postal_address" value="{{$lecturer->postal_address ?? ''}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number" value="{{$lecturer->mobile_number ?? ''}}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Email Address</label>
                            <input type="text" class="form-control" name="email" value="{{$lecturer->email ?? ''}}" disabled>
                        </div>
                    </div>
                </div><!-- end row -->
            </div>
        </div>
    </div>
    @endrole
@endsection
