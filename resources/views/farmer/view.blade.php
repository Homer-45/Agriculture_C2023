@extends('front_master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-sm-6">
                <h1 class="m-2">Update/View Farmer Information</h1>
            </div>
        </div>
        <div class="row col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 ml-5" style=" display: flex; align-items: center; justify-content: center;">
            <!-- general form elements -->
            <div class="card card-dark card-outline">
                <div class="card-header bg-success">
                    <h3 class="card-title">Personal Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" action="{{ url('farmer/update/' .$farmers->id) }}" method="POST" enctype="multipart/form-data" onsubmit="btn.disabled = true; return true;">
                    @csrf
                    <div class="card-body">
                        <!-- <div class="card bg-dark mb-3" style="height:40px;">
                            <h5 class="p-2">PERSONAL INFORMATION</h5>
                        </div> -->
                        <div class="row form-group col-md-6">
                            <label for="exampleInputEmail1">Reference Number</label><p> (Region  --  Province  --  City/Municipality  --  Barangay)</p>
                            <input type="text" class="form-control text-center" name="reference_number" value="{{ $farmers->reference_number }}" pattern="\d{4}-\d{4}-\d{4}-\d{4}">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2" >
                                <label>First Name:</label>
                                <input type="text" class="form-control" name="first_name" value="{{ $farmers->first_name }}" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Middle Name:</label>
                                <input type="text" class="form-control" name="middle_name" value="{{ $farmers->middle_name}}" onkeydown="return /[a-z ]/i.test(event.key)">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Last Name:</label>
                                <input type="text" class="form-control" name="last_name" name="last_name" value="{{ $farmers->last_name}}" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group col-md-1">
                                <label>Suffix:</label>
                                <input type="text" class="form-control" name="suffix" value="{{ $farmers->suffix }}" onkeydown="return /[a-z ]/i.test(event.key)">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="">Sex:</label>
                                <div class="row mt-2">
                                    <div class="form-check ml-4">
                                    <input class="form-check-input" type="radio" name="sex" value="male" @if($farmers->sex == 'male') checked @endif>
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check ml-4">
                                    <input class="form-check-input" type="radio" name="sex" value="female" @if($farmers->sex == 'female') checked @endif>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2" >
                                <label>House No.:</label>
                                <input type="text" class="form-control" name="house" value="{{ $farmers->house }}">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Street:</label>
                                <input type="text" class="form-control" name="street" value="{{ $farmers->street }}">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Barangay:</label>
                                <select class="form-control" name="barangay">                                    
                                    <option value="{{ $farmers->barangay_id }}" >{{ $farmers->barangays->brgy_name }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Municipality/City:</label>
                                <input type="text" class="form-control" name="city" value="{{ $farmers->city }}">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Province:</label>
                                 <input type="text" class="form-control" name="province" value="{{ $farmers->province }}">
                            </div>
                            <div class="form-group col-md-1" >
                                <label>Region:</label>
                                <input type="text" class="form-control" name="region" value="{{ $farmers->region }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2" >
                                <label>Mobile Number:</label>
                                <input type="text" class="form-control" name="mobile" value="{{ $farmers->mobile }}" pattern="[0-9]{10}">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Date of Birth:</label>
                                <input type="date" class="form-control" name="date_birth" value="{{ $farmers->date_birth }}">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Place of Birth:</label>
                                <input type="text" class="form-control" name="place_birth" value="{{ $farmers->place_birth }}">
                            </div>
                            <div class="form-group ml-2">
                                <label>Civil Status:</label>
                                <select class="form-control col-md-13" name="status">
                                    <option></option>
                                    <option value="Single" @if($farmers->status == 'Single') selected @endif>Single</option>
                                    <option value="Married" @if($farmers->status == 'Married') selected @endif>Married</option>
                                    <option value="Widowed" @if($farmers->status == 'Widowed') selected @endif>Widowed</option>
                                    <option value="Separated" @if($farmers->status == 'Separated') selected @endif>Separated</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 ml-2">
                                <label>Religion:</label>
                                <div class="row mt-2">
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="religion" value="Islam" @if($farmers->religion == 'Islam') checked @endif>
                                        <label class="form-check-label">Islam</label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="religion" value="Roman Catholic" @if($farmers->religion == 'Roman Catholic') checked @endif>
                                        <label class="form-check-label">Roman Catholic</label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="religion" value="Other Christian Group" @if($farmers->religion == 'Other Christian Group') checked @endif>
                                        <label class="form-check-label">Other Christian Group</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Name of Spouse (If married):</label>
                                <input type="text" class="form-control" name="spouse" value="{{ $farmers->spouse }}" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Mother's Maiden Name:</label>
                                <input type="text" class="form-control" name="mothername" value="{{ $farmers->mothername }}" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group ml-2">
                                <label>With Government ID?</label>
                                <div class="row">
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" type="radio" name="govID" value="yes" @if($farmers->govID == 'yes') checked @endif>
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" type="radio" name="govID" value="no" @if($farmers->govID == 'no') checked @endif>
                                        <label class="form-check-label">No</label>
                                    </div>
                                    <div class="form-check ml-1 mt-2">
                                        <label class="form-check-label">If Yes, specify ID type: </label>
                                    </div>
                                    <div class="form-check row d-flex">
                                        <input type="text" class="form-control form-control-border col-md-11" name="govID" value="{{ $farmers->govID }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3 ml-3">
                                <label>ID Number:</label>
                                <input type="text" class="form-control" name="id_number" value="{{ $farmers->id_number }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" style="float:right;" name="btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection