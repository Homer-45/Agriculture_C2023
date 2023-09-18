@extends('front_master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2">Farmer</h1>
            </div>
        </div>
        <nav>
            <ol>
                <a href="{{ route('export') }}"><button class="btn btn-danger"> Download Xlsx</button></a>
            </ol>
        </nav>
        <div class="col-md-4 ml-3">
            <!-- general form elements -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Import Farmer</h3>
                </div>
                <form class="forms-sample p-3" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Xlsx File Import</label>
                        <input type="file" name="import_file" class="form-control">
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-primary" style="float:right;">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection