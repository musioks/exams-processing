@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Units</li>
@endsection
@section('title')
    My Units
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
                            <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Register Unit</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/portal/student/units') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label  for="form-username">Units</label>
                                        <input type="hidden" name="student_id" value="{{$student->id}}">
                                        <select name="unit_id[]" class=" form-control select2"  multiple>
                                            @forelse($units as $unit)
                                                <option value="{{ $unit->id }}"> {{$unit->name}}</option>
                                            @empty
                                                <option value="">No data</option>
                                            @endforelse
                                        </select>
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
                            data-target="#myModal"><i class="fa fa-fw fa-edit"></i>Register Units
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
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($my_units as $i=>$unit)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td><span data-toggle="tooltip" data-placement="top"
                                          title="{{$unit->description ?? ''}}">{{$unit->name ?? ''}}</span></td>
                                <td>{{$unit->code ?? ''}}</td>
                                <td>{{$unit->max_hrs ?? '-'}}</td>

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
