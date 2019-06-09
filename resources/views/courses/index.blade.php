@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Courses</li>
@endsection
@section('title')
   Manage Courses
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
                            <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Create Course</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="{{ url('academics/courses') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="form-username">Course name <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" name="name" placeholder=".. Course name" required=""
                                               class=" form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-username">Course Code <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" name="course_code" placeholder=".. Course Code" required=""
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-username">Duration<span class="text-danger">*</span></label>
                                        <input type="text" name="duration" placeholder=".. Course Duration" required=""
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-username">Duration Type<span
                                                    class="text-danger">*</span></label>
                                        <select class="form-control" name="duration_type" required>
                                            <option value="Years">Years</option>
                                            <option value="Months">Months</option>
                                            <option value="Weeks">Weeks</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-username">Description (Optional)</label>
                                        <textarea name="description" placeholder="More Course details"
                                                  class="form-control"></textarea>
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
                <div class="float-right mb-3">
                    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                            data-target="#myModal"><i class="fa fa-fw fa-plus-circle"></i>Add Course
                    </button>
                </div>
                <div class="clearfix"></div>
                <!-- fetch courses -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="datatable">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Course Code</th>
                            <th scope="col">Duration</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($courses as $i=>$course)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td><span data-toggle="tooltip" data-placement="top"
                                          title="{{$course->description ?? ''}}">{{$course->name ?? ''}}</span></td>
                                <td>{{$course->course_code ?? ''}}</td>
                                <td>{{$course->duration ?? '-'}} {{$course->duration_type ?? '-'}}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                       data-target="#edit-modal-{{ $course->id }}">View</a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                       data-target="#delete-modal-{{ $course->id }}"><i class="fa fa-trash-o"></i></a>
                                    <a href="{{ url('/academics/courses/'.$course->id.'/units') }}" class="btn btn-primary btn-sm"><i class=" fa fa-fw fa-eye "></i>View Units</a>
                                </td>

                                <!-- Update Modal -->
                                <div class="modal fade" id="edit-modal-{{ $course->id }}"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-dark " id="myModalLabel1">Update Course</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" class="form-vertical" id="update-form-{{$course->id}}"
                                                      method="post"
                                                      action="{{ url('/academics/courses/update/'.$course->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        <label for="form-username">Course name</label>
                                                        <input type="text" name="name" class=" form-control"
                                                               value="{{$course->name ?? ''}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="form-username">Course Code</label>
                                                        <input type="text" name="course_code" class="form-control"
                                                               value="{{$course->course_code ?? ''}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="form-username">Duration</label>
                                                        <input type="text" name="duration" class="form-control"
                                                               value="{{$course->duration ?? ''}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="form-username">Duration Type</label>
                                                        <select class="form-control" name="duration_type">
                                                            <option value="Years">Years</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Weeks">Weeks</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="form-username">Description</label>
                                                        <textarea name="description"
                                                                  class="form-control">{{$course->description ?? ''}}</textarea>
                                                    </div>
                                                </form>
                                                <button type="submit" class="btn btn-success float-right"
                                                        onclick="$('#update-form-{{$course->id}}').submit()">Update
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Update Modal -->

                                <!-- ====================Delete Modal===========================  -->
                                <div id="delete-modal-{{ $course->id }}" class="modal fade" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                     style="display: none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete this course?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url('/academics/courses/delete/'.$course->id) }}"
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
