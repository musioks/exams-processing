@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Intakes</li>
@endsection
@section('title')
    Manage Intakes
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
                            <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Create Intake</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="{{ url('academics/intakes') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Intake Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Intake Name" name="name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="datepicker-autoclose" name="start_date" autocomplete="off">
                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="datepicker-autoclose1" name="end_date" autocomplete="off">
                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Cut-Off Date</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="datepicker-autoclose2" name="cutoff_date">
                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="float-right mb-3">
                    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                            data-target="#myModal"><i class="fa fa-fw fa-plus-circle"></i>Add Intake
                    </button>
                </div>
                <div class="clearfix"></div>
                <!-- fetch courses -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="datatable">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NAME</th>
                            <th scope="col">START DATE</th>
                            <th scope="col">END DATE</th>
                            <th scope="col">CUT-OFF DATE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($intakes as $i=>$intake)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{ $intake->name }}</td>
                                <td>{{ $intake->start_date }}</td>
                                <td>{{ $intake->end_date }}</td>
                                <td>{{ $intake->cutoff_date }}</td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal-{{ $intake->id }}"><i class=" fa fa-fw fa-trash"></i></a>
                                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit-modal-{{ $intake->id }}"><i class=" fa fa-fw fa-edit "></i></a>
                                    <a href="{{ url('/academics/advertise-batch/'.$intake->id) }}" class="btn btn-primary btn-sm"><i class=" fa fa-fw fa-eye "></i>View Batches</a>
                                </td>

                                <!-- Update Modal -->
                                <div class="modal fade" id="edit-modal-{{ $intake->id }}"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-dark " id="myModalLabel1">Update Intake</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" class="form-vertical" id="update-form-{{$intake->id}}"
                                                      method="post"
                                                      action="{{ url('/academics/intakes/update/'.$intake->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        <label for="name">Intake Name </label>
                                                        <input type="text" class="form-control"  value="{{ $intake->name }}" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Start Date</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" value="{{ $intake->start_date }}" id="datepicker-autoclose" name="start_date">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>End Date</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" value="{{ $intake->end_date }}" id="datepicker-autoclose1" name="end_date">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cut-Off Date</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" value="{{ $intake->cutoff_date }}" id="datepicker-autoclose2" name="cutoff_date">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>
                                                </form>
                                                <button type="submit" class="btn btn-success float-right"
                                                        onclick="$('#update-form-{{$intake->id}}').submit()">Update
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Update Modal -->

                                <!-- ====================Delete Modal===========================  -->
                                <div id="delete-modal-{{ $intake->id }}" class="modal fade" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                     style="display: none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete this intake?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url('/academics/intakes/delete/'.$intake->id) }}"
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
