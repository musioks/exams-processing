@extends('layouts.master')
@section('crumbs')
    <li class="breadcrumb-item"><a href="{{url('/main')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('/academics/intakes')}}">Intakes</a></li>
    <li class="breadcrumb-item active">Batches</li>
@endsection
@section('title')
    Intake Batches
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
                            <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Assign Batch</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/academics/intakes/'.$intake->id.'/batches')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label  for="form-username">Batches</label>
                                        <select name="batch_id[]" class=" form-control select2"  multiple>
                                            @forelse($batches as $batch)
                                                <option value="{{ $batch->id }}"> {{$batch->name}}</option>
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
                            data-target="#myModal"><i class="fa fa-fw fa-plus-circle"></i>Assign Batch
                    </button>
                </div>
                <div class="clearfix"></div>
                <!-- fetch courses -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="datatable">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th>NAME</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($intake_batches as  $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
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
                                                <h5>Are you sure you want to remove this batch?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ url('/academics/intakes/'.$intake->id.'/batches/detach/'.$row->id) }}"
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
