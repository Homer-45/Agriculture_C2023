@extends('front_master')
@section('content')
<!-- Content Header (Page header) -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-2">Livestock Information</h1>
        </div>
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark d-flat">
                    <h3 class="card-title mt-2">List Livestock and Poultry</h3>
                    <a href="{{ route('add.livestock') }}"><button class="btn btn-success float-sm-right" style="float:right"><i class="nav-icon fas fa-plus"></i> Add List</button></a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center border border-gray"> Chicken</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th width="10%">Barangay</th>


                                <th width="5%">Carabao</th>
                                <th width="5%">Cattle</th>
                                <!-- Swine -->
                                <th width="5%">Breeder</th>
                                <th width="5%">Fattener</th>

                                <th width="5%">Goat</th>
                                <th width="5%">Sheep</th>
                                <!-- Chicken -->
                                <th width="5%">Broiler</th>
                                <th width="5%">Layer</th>
                                <th width="5%">Native</th>
                                <!-- Ducks -->
                                <th width="5%">Muscovy</th>
                                <th width="5%">Mallard</th>
                                
                                <th width="5%">Turkey</th>
                                <th width="5%">Geese</th>
                                <th width="5%">Quail</th>
                                <th width="5%">Dog</th>
                                <th width="5%">Horse</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>X</td>
                                <td>Internet Explorer 4.0</td>
                                <td>Internet</td>
                                <td>Win 95+</td>
                                <td>4</td>
                                <td>X</td>
                                <td>Internet</td>
                                <td>Win 95+</td>
                                <td>4</td>
                                <td>X</td>
                                <td>Internet</td>
                                <td>Win 95+</td>
                                <td>4</td>
                                <td>X</td>
                                <td>Internet</td>
                                <td>Win 95+</td>
                                <td>4</td>
                                <td>X</td>
                                
                            </tr>
                            <tr>
                                <td>X</td>
                                <td>Internet Explorer 4.0</td>
                                <td>Internet</td>
                                <td>Win 95+</td>
                                <td>4</td>
                                <td>X</td>
                                <td>Internet</td>
                                <td>Win 95+</td>
                                <td>4</td>
                                <td>X</td>
                                <td>Internet</td>
                                <td>Win 95+</td>
                                <td>4</td>
                                <td>X</td>
                                <td>Internet</td>
                                <td>Win 95+</td>
                                <td>4</td>
                                <td>X</td>
                                
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