@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Lecturers</li>
@endsection
@section('title')
    Manage  Lecturers
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- start modal -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Create Lecturer</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">

                                <form role="form" action="{{ url('/lecturers') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">FirstName <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter First Name"
                                                       name="firstname" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">MiddleName (Optional)</label>
                                                <input type="text" class="form-control" placeholder="Enter Middle Name"
                                                       name="middlename">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">LastName <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Last Name"
                                                       name="lastname" required="">
                                            </div>
                                        </div>
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Gender <span class="text-danger">*</span></label>
                                                <select name="gender" class="form-control" required>
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
                                                               placeholder="YYYY-MM-DD"
                                                               id="datepicker-autoclose" name="dob" autocomplete="off">
                                                        <span class="input-group-addon bg-custom b-0"><i
                                                                    class="mdi mdi-calendar text-white"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">National ID <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" placeholder="Enter National ID No."
                                                       name="national_id" required="">
                                            </div>
                                        </div>
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Postal Address (Optional)</label>
                                                <input type="text" class="form-control" placeholder="Enter Postal Address"
                                                       name="postal_address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Mobile Number (Optional)</label>
                                                <input type="text" class="form-control" placeholder="Enter Mobile Number"
                                                       name="mobile_number">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Email Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Email Address"
                                                       name="email" required="">
                                            </div>
                                        </div>
                                    </div><!-- end row -->
                                    <input type="hidden" name="employee_number" value="">
                                    <input type="hidden" name="user_id" value="">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light float-right">
                                        Submit
                                    </button>
                                </form>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                </div>
                <!-- end modal -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="float-right mb-3">
                    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                            data-target="#myModal"><i class="fa fa-fw fa-plus-circle"></i>Add Lecturer
                    </button>
                </div>
                <div class="clearfix"></div>
                <!-- fetch courses -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="datatable">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Employee No.</th>
                            <th scope="col">Email</th>
                            <th scope="col">National ID</th>
                            <th scope="col">Mobile No.</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($lecturers as $lecturer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$lecturer->fullname ?? ''}}</td>
                                <td>{{$lecturer->gender ?? ''}}</td>
                                <td>{{$lecturer->employee_number ?? ''}}</td>
                                <td>{{$lecturer->email ?? ''}}</td>
                                <td>{{$lecturer->national_id ?? ''}}</td>
                                <td>{{$lecturer->mobile_number ?? ''}}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                       data-target="#edit-modal-{{ $lecturer->id }}">View</a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                       data-target="#delete-modal-{{ $lecturer->id }}"><i class="fa fa-trash-o"></i></a>
                                    <a href="{{ url('/lecturers/'.$lecturer->id.'/units') }}" class="btn btn-primary btn-sm"><i class=" fa fa-fw fa-eye "></i>View Units</a>
                                </td>

                                <!-- Update Modal -->
                                <div class="modal fade" id="edit-modal-{{ $lecturer->id }}"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-dark " id="myModalLabel1">Update Batch</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" class="form-vertical" id="update-form-{{$lecturer->id}}"
                                                      method="post"
                                                      action="{{ url('/lecturers/update/'.$lecturer->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="name">FirstName</label>
                                                                <input type="text" class="form-control" name="firstname" value="{{$lecturer->firstname ?? ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="name">MiddleName</label>
                                                                <input type="text" class="form-control" name="middlename" value="{{$lecturer->middlename ?? ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="name">LastName</label>
                                                                <input type="text" class="form-control" name="lastname" value="{{$lecturer->lastname ?? ''}}">
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
                                                                               id="datepicker-autoclose" name="dob" value="{{$lecturer->dob ?? 'YYYY-MM-DD'}}" autocomplete="off">
                                                                        <span class="input-group-addon bg-custom b-0"><i
                                                                                    class="mdi mdi-calendar text-white"></i></span>
                                                                    </div><!-- input-group -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="name">National ID <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" name="national_id" value="{{$lecturer->national_id ?? ''}}">
                                                            </div>
                                                        </div>
                                                    </div><!-- end row -->
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="name">Postal Address</label>
                                                                <input type="text" class="form-control"  name="postal_address" value="{{$lecturer->postal_address ?? ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="name">Mobile Number</label>
                                                                <input type="text" class="form-control" name="mobile_number" value="{{$lecturer->mobile_number ?? ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="name">Email Address</label>
                                                                <input type="text" class="form-control" name="email" value="{{$lecturer->email ?? ''}}">
                                                            </div>
                                                        </div>
                                                    </div><!-- end row -->
                                                </form>
                                                <button type="submit" class="btn btn-success float-right"
                                                        onclick="$('#update-form-{{$lecturer->id}}').submit()">Update
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Update Modal -->

                                <!-- ====================Delete Modal===========================  -->
                                <div id="delete-modal-{{ $lecturer->id }}" class="modal fade" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                     style="display: none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete this lecturer?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url('/lecturers/delete/'.$lecturer->id) }}"
                                                   class="btn btn-success float-left">Okay</a>
                                                <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <!-- ====================End Delete Modal===========================  -->
                            </tr>
                        @empty
                            <p>No data</p>
                        @endforelse

                        </tbody>
                    </table>
                </div><!--end responsive table-->

            </div>
        </div>
    </div>
@endsection
