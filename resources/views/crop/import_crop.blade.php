@extends('front_master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2">Crop Information</h1>
            </div>
        </div>
        <nav>
            <ol>
                <a href="{{ route('crop.export') }}"><button class="btn btn-danger"> Download Xlsx</button></a>
            </ol>
        </nav>
        <div class="row col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12" style=" display: flex; align-items: center; justify-content: center;">
            <!-- general form elements -->
            <div class="card card-dark card-outline">
                <div class="card-header bg-success">
                    <h3 class="card-title">Import Farmer</h3>
                </div>
                <form class="forms-sample" action="{{ route('crop.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Xlsx File Import</label>
                        <input type="file" name="import_Cropfile" class="form-control">
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" style="float:right;">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection