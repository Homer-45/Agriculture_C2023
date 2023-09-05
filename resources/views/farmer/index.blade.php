@extends('front_master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2">Farmer Information</h1>
                <!-- buttons list -->
                <!-- <a href=""><button class="btn btn-success float-sm-left"><i class="nav-icon fas fa-plus"></i> Add List</button></a>  -->
                <!-- <a href=""><button class="btn btn-danger float-sm-left ml-2"><i class="nav-icon fas fa-trash"></i> Archive List</button></a> -->
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
                    <a href="{{ route('add.farmer') }}"><button class="btn btn-success float-sm-right" style="float:right"><i class="nav-icon fas fa-plus"></i> Add List</button></a>
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
                            <tr>
                                <td>Trident</td>
                                <td>Internet Explorer 4.0</td>
                                <td>Win 95+</td>
                                <td>Win 95+</td>
                                <td>4</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</button>
                                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Archive</button>
                                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> View</button>
                                </td>
                            </tr>
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