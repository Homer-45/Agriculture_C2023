@extends('front_master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2">Livestock Information</h1>
            </div>
        </div>
        <div class="row col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12" style=" display: flex; align-items: center; justify-content: center;">
            <!-- general form elements -->
            <div class="card card-dark card-outline">
                <div class="card-header bg-success">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" action="{{ route('store.farmer') }}" method="POST" enctype="multipart/form-part" >
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="exampleInputFile">2X2 Picture:</label>
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
                            <div class="form-group col-md-5">
                                <label for="exampleInputFile">Signature:</label>
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
                        </div>
                        <div class="card bg-dark mb-3" style="height:40px;">
                            <h5 class="p-2">PERSONAL INFORMATION</h5>
                        </div>
                        <div class="row form-group col-md-6">
                            <label for="exampleInputEmail1">Reference Number</label>
                            <input type="text" class="form-control text-center" name="reference_number" placeholder="Region  --  Province  --  City/Municipality  --  Barangay">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2" >
                                <label>First Name:</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Middle Name:</label>
                                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" onkeydown="return /[a-z ]/i.test(event.key)">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Last Name:</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group col-md-1">
                                <label>Suffix:</label>
                                <input type="text" class="form-control" name="suffix" placeholder="eg.Jr" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="">Sex:</label>
                                <div class="row mt-2">
                                    <div class="form-check ml-4">
                                    <input class="form-check-input" type="radio" name="sex" value="male">
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check ml-4">
                                    <input class="form-check-input" type="radio" name="sex" value="female">
                                        <label class="form-check-label">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2" >
                                <label>House No.:</label>
                                <input type="text" class="form-control" name="house" placeholder="Lot/Purok">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Street:</label>
                                <input type="text" class="form-control" name="street">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Barangay:</label>
                                <input type="text" class="form-control" name="barangay">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Municipality/City:</label>
                                <input type="text" class="form-control" name="city">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Province:</label>
                                <input type="text" class="form-control" name="province">
                            </div>
                            <div class="form-group col-md-1" >
                                <label>Region:</label>
                                <input type="text" class="form-control" name="region">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2" >
                                <label>Mobile Number:</label>
                                <input type="text" class="form-control" name="mobile">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Date of Birth:</label>
                                <input type="date" class="form-control" name="date_birth">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Place of Birth:</label>
                                <input type="text" class="form-control" name="place_birth" placeholder="Municipality">
                            </div>
                            <div class="form-group ml-2">
                                <label>Civil Status:</label>
                                <select class="form-control col-md-13" name="status">
                                    <option></option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 ml-2">
                                <label>Religion:</label>
                                <div class="row mt-2">
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="religion" value="Islam">
                                        <label class="form-check-label">Islam</label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="religion" value="Roman Catholic">
                                        <label class="form-check-label">Roman Catholic</label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="religion" value="Other Christian Group">
                                        <label class="form-check-label">Other Christian Group</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Name of Spouse (If married):</label>
                                <input type="text" class="form-control" name="spouse" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Mother's Maiden Name:</label>
                                <input type="text" class="form-control" name="mothername" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group ml-2">
                                <label>With Government ID?</label>
                                <div class="row">
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" type="radio" name="govID" value="yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" type="radio" name="govID" value="no">
                                        <label class="form-check-label">No</label>
                                    </div>
                                    <div class="form-check ml-1 mt-2">
                                        <label class="form-check-label">If Yes, specify ID type: </label>
                                    </div>
                                    <div class="form-check row d-flex">
                                        <input type="text" class="form-control form-control-border col-md-11" name="govID">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3 ml-3">
                                <label>ID Number:</label>
                                <input type="text" class="form-control" name="id_number" required>
                            </div>
                        </div>
                        <div class="card bg-dark mb-3 mt-1" style="height:40px;">
                            <h5 class="p-2">PART II: FARM PROFILE</h5>
                        </div>
                        <div class="card mb-3 mt-1" style="height:50px;">
                            <div class="row d-flex p-3">
                                <div class="form-check col-md-2">
                                    <label for="exampleInputEmail1">Main Livelihood:</label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="checkbox" name="main_livelihood" value="Farmer">
                                    <label class="form-check-label">Farmer</label>
                                </div>
                                <div class="form-check col-md-3">
                                    <input class="form-check-input" type="checkbox" name="main_livelihood" value="Farmworker/Laborer">
                                    <label class="form-check-label">Farmworker/Laborer</label>
                                </div>
                                <div class="form-check col-md-3">
                                    <input class="form-check-input" type="checkbox" name="main_livelihood" value="Fisherfolk">
                                    <label class="form-check-label">Fisherfolk</label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="checkbox" name="main_livelihood" value="Agri Youth">
                                    <label class="form-check-label">Agri Youth</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-center"><u>For Farmers:</u></h5>
                                        <label for="exampleInputEmail1">Type of Farming Activity</label>
                                        <div class="col">
                                            <div class="form-check col-md-2">
                                                <input class="form-check-input" type="checkbox" name="farming_activity" value="Rice">
                                                <label class="form-check-label">Rice</label>
                                            </div>
                                            <div class="form-check col-md-2">
                                                <input class="form-check-input" type="checkbox" name="farming_activity" value="Corn">
                                                <label class="form-check-label">Corn</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Other Crops,</label>
                                                <label class="form-check-label d-flex" style="font-size:13px">Please, specify:
                                                    <input type="text" class="form-control form-control-border col-md-7" name="farming_activity">
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Livestock,</label>
                                                <label class="form-check-label d-flex" style="font-size:13px">Please, specify:
                                                    <input type="text" class="form-control form-control-border col-md-7" name="farming_activity">
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Poultry,</label>
                                                <label class="form-check-label d-flex" style="font-size:13px">Please, specify:
                                                    <input type="text" class="form-control form-control-border col-md-7" name="farming_activity">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-center"><u>For Farmworkers:</u></h5>
                                        <label for="exampleInputEmail1">Kind of work</label>
                                        <div class="col-md-10 mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="farmworkers_work" value="Land Preparation">
                                                <label class="form-check-label">Land Preparation</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="farmworkers_work" value="Planting/Transplanting">
                                                <label class="form-check-label">Planting/Transplanting</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="farmworkers_work" value="Cultivation">
                                                <label class="form-check-label">Cultivation</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="farmworkers_work" value="Harvesting">
                                                <label class="form-check-label">Harvesting</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="farmworkers_work">
                                                <label class="form-check-label">Others, Please specify:
                                                    <input type="text" class="form-control form-control-border col-md-11 ml-1 mb-5" name="farmworkers_work">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-center"><u>For Fisherfolk:</u></h5>
                                        <p class="card-text" style="font-size:12px">
                                            The Lending Conduit shall coordinate with the Bureau of Fisheries 
                                            and Aquatic Resources (BFAR) in the issuance of a certification 
                                            that the fisherfolk-borrower under PUNLA/PLEA is registered 
                                            under the Municipal Registration (FishR).
                                        </p>
                                        <label for="exampleInputEmail1">Kind of Fishing Activity</label>
                                        <div class="row">
                                            <div class="form-check ml-2">
                                                <input class="form-check-input" type="checkbox" name="fisherfolk" value="Fish Capture">
                                                <label class="form-check-label">Fish Capture</label>
                                            </div>
                                            <div class="form-check ml-3">
                                                <input class="form-check-input" type="checkbox" name="fisherfolk" value="Fish Processing">
                                                <label class="form-check-label">Fish Processing</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-check ml-2">
                                                <input class="form-check-input" type="checkbox" name="fisherfolk" value="Aquaculture">
                                                <label class="form-check-label">Aquaculture</label>
                                            </div>
                                            <div class="form-check ml-3">
                                                <input class="form-check-input" type="checkbox" name="fisherfolk" value="Fish Vending">
                                                <label class="form-check-label">Fish Vending</label>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="fisherfolk" value="Gleaning">
                                            <label class="form-check-label">Gleaning</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label">Others, Please specify:
                                                <input type="text" class="form-control form-control-border col-md-11 ml-1" name="fisherfolk">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-center"><u>For Agri Youth:</u></h5>
                                        <p class="card-text" style="font-size:12px">
                                            For the purposes of trainings, financial assistance, 
                                            and other programs catered to the youth 
                                            with involvement to any agriculture activity.
                                        </p>
                                        <label for="exampleInputEmail1">Type of Involvement</label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="agri_youth" value="Part of a farming household">
                                                <label class="form-check-label" style="font-size:12px">
                                                    Part of a farming household
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="agri_youth" value="Attending/attended formal agri-fishery related course">
                                                <label class="form-check-label" style="font-size:12px">
                                                    Attending/attended formal agri-fishery related course
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="agri_youth" value="Attending/attended non-formal agri-fishery related course">
                                                <label class="form-check-label" style="font-size:12px">
                                                    Attending/attended non-formal agri-fishery related course 
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="agri_youth" value="Participated in any agricultural activity/program ">
                                                <label class="form-check-label" style="font-size:12px">
                                                    Participated in any agricultural activity/program 
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label" style="font-size:12px">
                                                    Others, specify
                                                    <input type="text" class="form-control form-control-border col-md-11 ml-1" name="agri_youth">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-3" style="height:70px;">
                            <div class="row p-4">
                                <div class="form-check mr-4">
                                    <label for="exampleInputEmail1">Gross Annual Income Last Year:</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label d-flex">
                                        Farming: 
                                        <input type="text" class="form-control form-control-border ml-1" name="grossFarming">
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label d-flex">
                                        Non-Farming: 
                                        <div class="row">
                                            <input type="text" class="form-control form-control-border ml-2" name="grossNonFarming">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" style="float:right;">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection