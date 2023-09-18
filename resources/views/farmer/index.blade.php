@extends('front_master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2 mb-3"><b>Farmer Information</b></h1>
                <!-- buttons list -->
                <nav>
                    <ol>
                        <a href="{{ route('add.farmer') }}"><button class="btn btn-success"><i class="nav-icon fas fa-plus"></i> Add List</button></a>
                        &nbsp; &nbsp; &nbsp;
                        <a href="{{ route('import.farmer') }}"><button class="btn btn-warning"> Import</button></a>
                        &nbsp; &nbsp; &nbsp;
                        <a href="{{ route('export') }}"><button class="btn btn-danger"> Export</button></a>
                    </ol>
                </nav>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title mt-2">List</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10%">Full Name</th>
                                <th width="10%">Reference Number</th>
                                <th width="8%">Address</th>
                                <th width="8%">Mobile Number</th>
                                <th width="7%">Date of Birth</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($farmers as $farmer)
                            <tr>
                                <td>{{ $i++ }}. {{$farmer->first_name}} {{$farmer->middle_name}} {{$farmer->last_name}}</td>
                                <td>{{$farmer->reference_number}}</td>
                                <td>{{$farmer->barangay}}</td>
                                <td>{{$farmer->mobile}}</td>
                                <td>{{$farmer->date_birth}}</td>
                                <td>
                                    <!-- <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> -->
                                    <a href="{{ url('farmer/edit/'.$farmer->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> View</a>
                                    <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modal-danger{{$farmer->id}}">
                                        <i class="nav-icon fas fa-trash"></i>Delete
                                    </button>
                                    <div class="modal fade" id="modal-danger{{$farmer->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Permanently Delete Record?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('delete/farmer/'.$farmer->id) }}">
                                                    <div class="modal-body" id="modal-danger">
                                                        <p>Are you sure you want to delete this Farmer?</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                            </tr>
                        </tfoot> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection