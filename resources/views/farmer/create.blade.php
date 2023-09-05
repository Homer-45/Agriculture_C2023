@extends('front_master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2">Livestock Information</h1>
            </div>
        </div>
        <div class="row col-md-12" style=" display: flex; align-items: center; justify-content: center;">
            <!-- general form elements -->
            <div class="card card-dark card-outline">
                <div class="card-header bg-success">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
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
                            <h5 class="p-2">PART I: PERSONAL INFORMATION</h5>
                        </div>
                        <div class="row form-group col-md-6">
                            <label for="exampleInputEmail1">Reference Number</label>
                            <input type="email" class="form-control text-center" name="reference_number" placeholder="Region  --  Province  --  City/Municipality  --  Barangay">
                        </div>
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
                                <input type="text" class="form-control" name="extension_name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="">Sex:</label>
                                <div class="row mt-2">
                                    <div class="form-check ml-4">
                                    <input class="form-check-input" type="radio" name="sex" id="male">
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check ml-4">
                                    <input class="form-check-input" type="radio" name="sex" id="female">
                                        <label class="form-check-label">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3" >
                                <label>House/Lot/Bldg.No/Purok:</label>
                                <input type="text" class="form-control" name="house">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Street/Sitio/SubDv.:</label>
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
                                <label>Landline Number:</label>
                                <input type="text" class="form-control" name="landline">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Date of Birth:</label>
                                <input type="date" class="form-control" name="date_birth">
                            </div>
                            <div class="form-group col-md-2" >
                                <label>Place of Birth:</label>
                                <input type="text" class="form-control" name="place_birth" placeholder="Municipality">
                            </div>
                            <div class="form-group col-md-2" >
                                <label></label>
                                <input type="text" class="form-control mt-2" name="state" placeholder="Province/State">
                            </div>
                            <div class="form-group col-md-2" >
                                <label></label>
                                <input type="text" class="form-control mt-2" name="country" placeholder="Country">
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Religion:</label>
                                <div class="row mt-2">
                                    <div class="form-check ml-4">
                                        <input class="form-check-input" type="radio" name="religion" id="christianity">
                                        <label class="form-check-label">Christianity</label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="religion" id="islam">
                                        <label class="form-check-label">Islam</label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="religion">
                                        <label class="form-check-label">Others:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control form-control-border col-md-10" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label>Highest Formal Education:</label>
                                    <select class="form-control col-md-11">
                                        <option>None</option>
                                        <option>Pre-School</option>
                                        <option>Elementary</option>
                                        <option>High School (non K-12)</option>
                                        <option>Junior High School (K-12)</option>
                                        <option>Senior High School (K-12)</option>
                                        <option>College</option>
                                        <option>Vocational</option>
                                        <option>Post-Graduate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-2 ml-1">
                                <label>Person with Disability (PWD):</label>
                                <div class="row">
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2 ml-1">
                                <label>4P's Beneficiary:</label>
                                <div class="row">
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                            <div class="form-group col-md-3 ml-2">
                                <label>Name of Spouse (If married):</label>
                                <input type="text" class="form-control" name="spouse" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Mother's Maiden Name:</label>
                                <input type="text" class="form-control" name="mothername" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group ml-2">
                                <label>Member of an Indigenous Group?</label>
                                <div class="row">
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" type="radio" name="indigenous">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" type="radio" name="indigenous">
                                        <label class="form-check-label">No</label>
                                    </div>
                                    <div class="form-check ml-2 mt-2">
                                        <label class="form-check-label">If Yes, specify: </label>
                                    </div>
                                    <div class="form-check row d-flex">
                                        <input type="text" class="form-control form-control-border col-md-11" name="indigenous">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group ml-2">
                                <label>Household Head:</label>
                                <div class="row mt-2">
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="household">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="household">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3 ml-2">
                                <label>If No, name of Household head:</label>
                                <input type="text" class="form-control" name="household_name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Relationship:</label>
                                <input type="text" class="form-control" name="relationship" onkeydown="return /[a-z ]/i.test(event.key)" required>
                            </div>
                                <div class="form-group col-md-3 ml-2" >
                                    <label>No. of Living household members:</label>
                                    <input type="text" class="form-control col-md-7" name="household_members" required>
                                </div>
                            <div class="form-group col-md-1">
                                <label style="font-size: 16px; width: 200%;">No. of male:</label>
                                <input type="text" class="form-control" name="household_male" required>
                            </div>
                            <div class="form-group col-md-1 ml-3">
                                <label style="font-size: 16px; width: 200%;">No. of female:</label>
                                <input type="text" class="form-control" name="household_female" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group ml-2">
                                <label>With Government ID?</label>
                                <div class="row">
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" type="radio" name="govID">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check ml-3 mt-2">
                                        <input class="form-check-input" type="radio" name="govID">
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
                            <div class="row ml-3">
                                <div class="form-group col-md-3">
                                    <label>ID Number:</label>
                                    <input type="text" class="form-control" name="id_number" required>
                                </div>
                                <div class="form-group col-md-9">
                                    <label>Member of any Farmers Association/Cooperative?</label>
                                    <div class="row">
                                        <div class="form-check ml-3 mt-2">
                                            <input class="form-check-input" type="radio" name="farmers_coop">
                                            <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check ml-2 mt-2">
                                            <input class="form-check-input" type="radio" name="farmers_coop">
                                            <label class="form-check-label">No</label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <label class="form-check-label">If Yes, specify: </label>
                                        </div>
                                        <div class="form-check row d-flex">
                                            <input type="text" class="form-control form-control-border" name="farmers_coop">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="exampleInputEmail1">Person to Notify in Case of Emergency:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="exampleInputEmail1">Contact Number:</label>
                                <input type="text" class="form-control">
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
                                    <input class="form-check-input" type="checkbox" name="main_livelihood">
                                    <label class="form-check-label">Farmer</label>
                                </div>
                                <div class="form-check col-md-3">
                                    <input class="form-check-input" type="checkbox" name="main_livelihood">
                                    <label class="form-check-label">Farmworker/Laborer</label>
                                </div>
                                <div class="form-check col-md-3">
                                    <input class="form-check-input" type="checkbox" name="main_livelihood">
                                    <label class="form-check-label">Fisherfolk</label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="checkbox" name="main_livelihood">
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
                                                <input class="form-check-input" type="checkbox" name="farming_activity">
                                                <label class="form-check-label">Rice</label>
                                            </div>
                                            <div class="form-check col-md-2">
                                                <input class="form-check-input" type="checkbox" name="farming_activity">
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
                                                <input class="form-check-input" type="checkbox" name="farmworkers_work">
                                                <label class="form-check-label">Land Preparation</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="farmworkers_work">
                                                <label class="form-check-label">Planting/Transplanting</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="farmworkers_work">
                                                <label class="form-check-label">Cultivation</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="farmworkers_work">
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
                                                <input class="form-check-input" type="checkbox" name="fisherfolk">
                                                <label class="form-check-label">Fish Capture</label>
                                            </div>
                                            <div class="form-check ml-3">
                                                <input class="form-check-input" type="checkbox" name="fisherfolk">
                                                <label class="form-check-label">Fish Processing</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-check ml-2">
                                                <input class="form-check-input" type="checkbox" name="fisherfolk">
                                                <label class="form-check-label">Aquaculture</label>
                                            </div>
                                            <div class="form-check ml-3">
                                                <input class="form-check-input" type="checkbox" name="fisherfolk">
                                                <label class="form-check-label">Fish Vending</label>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="fisherfolk">
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
                                                <input class="form-check-input" type="checkbox" name="agri_youth">
                                                <label class="form-check-label" style="font-size:12px">
                                                    Part of a farming household
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="agri_youth">
                                                <label class="form-check-label" style="font-size:12px">
                                                    Attending/attended formal agri-fishery related course
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="agri_youth">
                                                <label class="form-check-label" style="font-size:12px">
                                                    Attending/attended non-formal agri-fishery related course 
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="agri_youth">
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
                                        <input type="text" class="form-control form-control-border ml-1" name="gross_incomeFarming">
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label d-flex">
                                        Non-Farming: 
                                        <div class="row">
                                            <input type="text" class="form-control form-control-border ml-2" name="gross_incomeNonFarming">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black;">
                    <div class="card-body">
                        <div class="card mb-3" style="height:70px;">
                            <div class="row p-3">
                                <div class="form-check">
                                    <label class="form-check-label d-flex">
                                        No. of Farm Parcels:
                                        <div class="row">
                                            <input type="text" class="form-control form-control-border ml-3" name="farm_parcels">
                                        </div> 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label d-flex">
                                        Name of Farmer/s in Rotation: (P1)
                                        <div class="row">
                                            <input type="text" class="form-control form-control-border ml-2" name="farmersRotationP1">
                                        </div>
                                        (P2)
                                        <div class="row">
                                            <input type="text" class="form-control form-control-border ml-2" name="farmersRotationP2">
                                        </div>
                                        (P3)
                                        <div class="row">
                                            <input type="text" class="form-control form-control-border ml-2" name="farmersRotationP3">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <label for="">1.</label>
                            <div class="col-md-5">
                                <label for="">Farm Location:</label>
                                <div class="col">
                                    <label for="">Barangay:
                                        <div class="col">
                                            <input type="text" class="form-control form-control-border ml-3" name="first_name">
                                        </div>
                                    </label>
                                    <label for="">City/Municipality:
                                        <div class="col">
                                            <input type="text" class="form-control form-control-border ml-3" name="first_name">
                                        </div>
                                    </label>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="form-group mr-3">
                                            <label for="">Total Farm Area (in hectares):
                                                <input type="text" class="form-control">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Within Ancestral Domain:</label>
                                            <div class="row ml-1">
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">Yes</label>
                                                </div>
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="form-group mr-3">
                                            <label for="">Ownership Document No.:
                                                <input type="text" class="form-control">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Agrarian Reform Beneficiary:</label>
                                            <div class="row ml-1">
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">Yes</label>
                                                </div>
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Ownership Type:</label>
                                    <div class="col d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio1">
                                            <label class="form-check-label">Registered Owner</label>
                                        </div>
                                        <div class="form-check ml-5">
                                            <input class="form-check-input" type="radio" name="radio1">
                                            <label class="form-check-label">Others:</label>
                                        </div>
                                        <div class="row ml-1">
                                            <input type="text" class="form-control form-control-border col-md-10" name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <div class="row d-flex">
                                            <label class="form-check-label ml-1">Tenant(Name of Land Owner): </label>
                                            <input type="text" class="form-control form-control-border col-md-5" name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <div class="row d-flex">
                                            <label class="form-check-label ml-1">Lessee(Name of Land Owner): </label>
                                            <input type="text" class="form-control form-control-border col-md-5" name="first_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="font-size:12px;">
                                    <div class="form-group col-md-2" >
                                        <label for="">Crop/Commodity</label><p style="font-size:11px">(Rice/Corn/HVC/Livestock/Poultry/Agri-fisheries)</p>
                                        <label for="">For Livestock & Poultry</label><p style="font-size:11px">(Specify type of animal)</p>
                                    </div>
                                    <div class="form-group col-md-1 ml-3" >
                                        <label for="">Size(ha)</label>
                                    </div>
                                    <div class="form-group col-md-2 ml-5">
                                        <label for="">No. of Heads</label><p style="font-size:11px">(For Livestock & Poultry)</p>
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <label for="">Farm Type</label>
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <label for="">Organic Pracitioner(Y/N)</label>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="">REMARKS</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2"  >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <label for="">2.</label>
                            <div class="col-md-5">
                                <label for="">Farm Location:</label>
                                <div class="col">
                                    <label for="">Barangay:
                                        <div class="col">
                                            <input type="text" class="form-control form-control-border ml-3" name="first_name">
                                        </div>
                                    </label>
                                    <label for="">City/Municipality:
                                        <div class="col">
                                            <input type="text" class="form-control form-control-border ml-3" name="first_name">
                                        </div>
                                    </label>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="form-group mr-3">
                                            <label for="">Total Farm Area (in hectares):
                                                <input type="text" class="form-control">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Within Ancestral Domain:</label>
                                            <div class="row ml-1">
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">Yes</label>
                                                </div>
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="form-group mr-3">
                                            <label for="">Ownership Document No.:
                                                <input type="text" class="form-control">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Agrarian Reform Beneficiary:</label>
                                            <div class="row ml-1">
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">Yes</label>
                                                </div>
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Ownership Type:</label>
                                    <div class="col d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio1">
                                            <label class="form-check-label">Registered Owner</label>
                                        </div>
                                        <div class="form-check ml-5">
                                            <input class="form-check-input" type="radio" name="radio1">
                                            <label class="form-check-label">Others:</label>
                                        </div>
                                        <div class="row ml-1">
                                            <input type="text" class="form-control form-control-border col-md-10" name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <div class="row d-flex">
                                            <label class="form-check-label ml-1">Tenant(Name of Land Owner): </label>
                                            <input type="text" class="form-control form-control-border col-md-5" name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <div class="row d-flex">
                                            <label class="form-check-label ml-1">Lessee(Name of Land Owner): </label>
                                            <input type="text" class="form-control form-control-border col-md-5" name="first_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <label for="">3.</label>
                            <div class="col-md-5">
                                <label for="">Farm Location:</label>
                                <div class="col">
                                    <label for="">Barangay:
                                        <div class="col">
                                            <input type="text" class="form-control form-control-border ml-3" name="first_name">
                                        </div>
                                    </label>
                                    <label for="">City/Municipality:
                                        <div class="col">
                                            <input type="text" class="form-control form-control-border ml-3" name="first_name">
                                        </div>
                                    </label>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="form-group mr-3">
                                            <label for="">Total Farm Area (in hectares):
                                                <input type="text" class="form-control">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Within Ancestral Domain:</label>
                                            <div class="row ml-1">
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">Yes</label>
                                                </div>
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="form-group mr-3">
                                            <label for="">Ownership Document No.:
                                                <input type="text" class="form-control">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Agrarian Reform Beneficiary:</label>
                                            <div class="row ml-1">
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">Yes</label>
                                                </div>
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Ownership Type:</label>
                                    <div class="col d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio1">
                                            <label class="form-check-label">Registered Owner</label>
                                        </div>
                                        <div class="form-check ml-5">
                                            <input class="form-check-input" type="radio" name="radio1">
                                            <label class="form-check-label">Others:</label>
                                        </div>
                                        <div class="row ml-1">
                                            <input type="text" class="form-control form-control-border col-md-10" name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <div class="row d-flex">
                                            <label class="form-check-label ml-1">Tenant(Name of Land Owner): </label>
                                            <input type="text" class="form-control form-control-border col-md-5" name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="radio1">
                                        <div class="row d-flex">
                                            <label class="form-check-label ml-1">Lessee(Name of Land Owner): </label>
                                            <input type="text" class="form-control form-control-border col-md-5" name="first_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                    <div class="form-group col-md-2" >
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
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