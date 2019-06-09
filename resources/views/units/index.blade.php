@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Units</li>
@endsection
@section('title')
    Manage Units
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
                            <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Create Unit</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="{{ url('academics/units') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="form-username">Unit name <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" name="name" placeholder=".. Unit name" required=""
                                               class=" form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-username">Unit Code <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" name="code" placeholder=".. Unit Code" required=""
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-username">Contact Hours<span class="text-danger">*</span></label>
                                        <input type="number" name="max_hrs" placeholder=".. Unit Contact Hours" required=""
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-username">Description (Optional)</label>
                                        <textarea name="description" placeholder="More unit details"
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
                            data-target="#myModal"><i class="fa fa-fw fa-plus-circle"></i>Add Unit
                    </button>
                </div>
                <div class="clearfix"></div>
                <!-- fetch units -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="datatable">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Unit Name</th>
                            <th scope="col">Unit Code</th>
                            <th scope="col">Contact Hours</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($units as $i=>$unit)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td><span data-toggle="tooltip" data-placement="top"
                                          title="{{$unit->description ?? ''}}">{{$unit->name ?? ''}}</span></td>
                                <td>{{$unit->code ?? ''}}</td>
                                <td>{{$unit->max_hrs ?? '-'}}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                       data-target="#edit-modal-{{ $unit->id }}">View</a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                       data-target="#delete-modal-{{ $unit->id }}"><i class="fa fa-trash-o"></i></a>
                                    <a href="{{ url('/academics/units/'.$unit->id.'/exams') }}"
                                                                           class="btn btn-primary btn-sm"><i class=" fa fa-fw fa-eye "></i>View Exams</a>
                                </td>

                                <!-- Update Modal -->
                                <div class="modal fade" id="edit-modal-{{ $unit->id }}"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-dark " id="myModalLabel1">Update Unit</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" class="form-vertical" id="update-form-{{$unit->id}}"
                                                      method="post"
                                                      action="{{ url('/academics/units/update/'.$unit->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        <label for="form-username">Unit name</label>
                                                        <input type="text" name="name" class=" form-control"
                                                               value="{{$unit->name ?? ''}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="form-username">Unit Code</label>
                                                        <input type="text" name="code" class="form-control"
                                                               value="{{$unit->code ?? ''}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="form-username">Contact Hours</label>
                                                        <input type="number" name="max_hrs" class="form-control"
                                                               value="{{$unit->max_hrs ?? ''}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="form-username">Description</label>
                                                        <textarea name="description"
                                                                  class="form-control">{{$unit->description ?? ''}}</textarea>
                                                    </div>
                                                </form>
                                                <button type="submit" class="btn btn-success float-right"
                                                        onclick="$('#update-form-{{$unit->id}}').submit()">Update
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Update Modal -->

                                <!-- ====================Delete Modal===========================  -->
                                <div id="delete-modal-{{ $unit->id }}" class="modal fade" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                     style="display: none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete this unit?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url('/academics/units/delete/'.$unit->id) }}"
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
