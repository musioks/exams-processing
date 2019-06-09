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
