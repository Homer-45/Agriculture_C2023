@extends('front_master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2">Livestock Information</h1>
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
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3" >
                            <label>First Name:</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Middle Name:</label>
                            <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" onkeydown="return /[a-z ]/i.test(event.key)">
                        </div>
                        <div class="form-group col-md-3" >
                            <label>Last Name:</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Extension Name:</label>
                            <input type="text" class="form-control" name="last_name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="">Sex:</label>
                            <div class="row mt-2">
                                <div class="form-check ml-5">
                                <input class="form-check-input" type="radio" name="radio1">
                                    <label class="form-check-label">Male</label>
                                </div>
                                <div class="form-check ml-4">
                                <input class="form-check-input" type="radio" name="radio1">
                                    <label class="form-check-label">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    </div>
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection