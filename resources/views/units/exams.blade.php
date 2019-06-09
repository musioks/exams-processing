@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('/academics/units')}}">Units</a></li>
    <li class="breadcrumb-item active">Exams</li>
@endsection
@section('title')
    Manage Unit Exams
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
                            <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Create Exam</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/academics/units/'.$unit->id.'/exams') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="unit_id" value="{{$unit->id}}">
                                    <div class="form-group">
                                        <label for="name">Exam Name <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control"  name="name" placeholder="Name of exam" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Total Marks <small class="text-danger">*</small></label>
                                        <input type="number" class="form-control"  name="total_marks" placeholder="eg. 70" required>
                                    </div>
                                    <div class="form-group">
                                        <label  for="form-username">Batches<small class="text-danger">*</small> </label>
                                        <select name="batch_id" class="form-control select2" required>
                                            @forelse($batches as $batch)
                                                <option value="{{ $batch->id }}"> {{$batch->name}}</option>
                                            @empty
                                                <option value="">No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label  for="form-username">Exam Types <small class="text-danger">*</small></label>
                                        <select name="exam_type_id" class="form-control select2" required>
                                            @forelse($exam_types as $exam_type)
                                                <option value="{{ $exam_type->id }}"> {{$exam_type->name}}</option>
                                            @empty
                                                <option value="">No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Exam Date <small class="text-danger">*</small> </label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control"  id="datepicker-autoclose3" name="exam_date" required>
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
                            data-target="#myModal"><i class="fa fa-fw fa-plus-circle"></i>Create Exam
                    </button>
                </div>
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
                        @forelse($exams as  $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->exam_type->name ?? '' }}</td>
                                <td>{{ $row->name ?? ''}}</td>
                                <td>{{ $row->unit->name ?? ''}}</td>
                                <td>{{ $row->batch->name ?? ''}}</td>
                                <td>{{ $row->total_marks ?? ''}}</td>
                                <td>{{ $row->exam_date }}</td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal-{{ $row->id }}"><i class=" fa fa-fw fa-trash"></i></a>
                                </td>
                                <!-- ====================Detach Modal===========================  -->
                                <div id="delete-modal-{{ $row->id }}" class="modal fade" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                     style="display: none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Are you sure you want to remove this exam?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url('academics/units/'.$unit->id.'/exams/delete/'.$row->id) }}"
                                                   class="btn btn-success float-left">Okay</a>
                                                <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <!-- ====================End Detach Modal===========================  -->
                            </tr>
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
