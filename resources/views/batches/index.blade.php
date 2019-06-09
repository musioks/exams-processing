@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Batches</li>
@endsection
@section('title')
   Manage  Batches
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
                            <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Create Batch</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">

                                <form role="form" action="{{ url('academics/batches') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Batch Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Batch Name"
                                                       name="name" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="form-username">Academic year <span
                                                            class="text-danger">*</span></label>
                                                <select name="academic_year_id" class="form-control select2" required>
                                                    <option value="{{ $academic_year->id }}"> {{$academic_year->name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="form-username">Course <span
                                                            class="text-danger">*</span></label>
                                                <select name="course_id" class="form-control select2" required>
                                                    @forelse($courses as $course)
                                                        <option value="{{ $course->id }}"> {{$course->name}}</option>
                                                    @empty
                                                        <option value="">No data</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="form-username">Year of Study<span
                                                            class="text-danger">*</span></label>
                                                <select name="year_of_study_id" class="form-control select2" required>
                                                    @forelse($study_years as $study_year)
                                                        <option value="{{ $study_year->id }}">Year {{$study_year->year_number}}</option>
                                                    @empty
                                                        <option value="">No data</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end row -->

                                    <div class="form-group">
                                        <label for="form-username">Semester <span
                                                    class="text-danger">*</span></label>
                                        <select name="term_id" class="form-control select2" required>
                                            @forelse($terms as $term)
                                                <option value="{{ $term->id }}"> {{$term->name}}</option>
                                            @empty
                                                <option value="">No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       placeholder="yyyy-mm-dd"
                                                       id="datepicker-autoclose" name="start_date" autocomplete="off">
                                                <span class="input-group-addon bg-custom b-0"><i
                                                            class="mdi mdi-calendar text-white"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       placeholder="yyyy-mm-dd"
                                                       id="datepicker-autoclose1" name="end_date" autocomplete="off">
                                                <span class="input-group-addon bg-custom b-0"><i
                                                            class="mdi mdi-calendar text-white"></i></span>
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
                            data-target="#myModal"><i class="fa fa-fw fa-plus-circle"></i>Add Batch
                    </button>
                </div>
                <div class="clearfix"></div>
                <!-- fetch courses -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="datatable">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> Name</th>
                            <th scope="col"> Course</th>
                            <th scope="col">Academic Year</th>
                            <th scope="col"> Start Date</th>
                            <th scope="col"> End Date</th>
                            <th scope="col">Year of Study</th>
                            <th scope="col">Semester</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($batches as $i=>$batch)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$batch->name ?? ''}}</td>
                                <td>{{$batch->course->name ?? ''}}</td>
                                <td>{{$batch->academic_year->name ?? ''}}</td>
                                <td>{{$batch->start_date ?? '-'}}</td>
                                <td>{{$batch->end_date ?? '-'}}</td>
                                <td>{{"Year"." ".$batch->year_of_study->year_number ?? '-'}}</td>
                                <td>{{$batch->term->name ?? '-'}}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                       data-target="#edit-modal-{{ $batch->id }}">View</a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                       data-target="#delete-modal-{{ $batch->id }}"><i class="fa fa-trash-o"></i></a>
                                </td>

                                <!-- Update Modal -->
                                <div class="modal fade" id="edit-modal-{{ $batch->id }}"
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
                                                <form role="form" class="form-vertical" id="update-form-{{$batch->id}}"
                                                      method="post"
                                                      action="{{ url('/academics/batches/update/'.$batch->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="name">Batch Name</label>
                                                                <input type="text" class="form-control"   value="{{$batch->name}}"
                                                                       name="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="form-username">Academic year</label>
                                                                <select name="academic_year_id" class="form-control select2">
                                                                    <option value="{{ $academic_year->id }}"> {{$academic_year->name}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div><!-- end row -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="form-username">Course</label>
                                                                <select name="course_id" class="form-control select2">
                                                                    @forelse($courses as $course)
                                                                        <option value="{{ $course->id }}"{{ ( $course->id == $batch->course_id ) ? 'selected' : '' }}>
                                                                            {{$course->name ?? ''}}</option>
                                                                    @empty
                                                                        <option value="">No data</option>
                                                                    @endforelse
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="form-username">Year of Study</label>
                                                                <select name="year_of_study_id" class="form-control select2">
                                                                    @forelse($study_years as $study_year)
                                                                        <option value="{{ $study_year->id }}"{{ ( $study_year->id == $batch->year_of_study_id ) ? 'selected' : '' }}>
                                                                            Year {{$study_year->year_number ?? ''}}</option>                                                                    @empty
                                                                        <option value="">No data</option>
                                                                    @endforelse
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div><!-- end row -->

                                                    <div class="form-group">
                                                        <label for="form-username">Semester</label>
                                                        <select name="term_id" class="form-control select2">
                                                            @forelse($terms as $term)
                                                                <option value="{{ $term->id }}"{{ ( $term->id == $batch->term_id ) ? 'selected' : '' }}>
                                                                    {{$term->name ?? ''}}</option>
                                                            @empty
                                                                <option value="">No data</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Start Date</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                       value="{{$batch->start_date}}"
                                                                       id="datepicker-autoclose" name="start_date">
                                                                <span class="input-group-addon bg-custom b-0"><i
                                                                            class="mdi mdi-calendar text-white"></i></span>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>End Date</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{$batch->end_date}}"
                                                                       id="datepicker-autoclose1" name="end_date">
                                                                <span class="input-group-addon bg-custom b-0"><i
                                                                            class="mdi mdi-calendar text-white"></i></span>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>
                                                </form>
                                                <button type="submit" class="btn btn-success float-right"
                                                        onclick="$('#update-form-{{$batch->id}}').submit()">Update
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Update Modal -->

                                <!-- ====================Delete Modal===========================  -->
                                <div id="delete-modal-{{ $batch->id }}" class="modal fade" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                     style="display: none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete this batch?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url('/academics/batches/delete/'.$batch->id) }}"
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
