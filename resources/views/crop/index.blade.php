@extends('front_master')
@section('content')
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2 mb-3"><b>Crops Information</b></h1>
                <!-- buttons list -->
                <nav>
                    <ol>
                        <a><button class="btn btn-success" data-toggle="modal" data-target="#survey-modal"><i class="nav-icon fas fa-plus"></i> Add List</button></a>
                        &nbsp; &nbsp; &nbsp;
                        <a href="{{ route('import.crop') }}"><button class="btn btn-warning"> Import</button></a>
                        &nbsp; &nbsp; &nbsp;
                        <a href="{{ route('crop.export') }}"><button class="btn btn-danger"> Export</button></a>
                    </ol>
                </nav>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title mt-2">List</h3>
                    <a><button class="btn btn-success float-sm-right" data-toggle="modal" data-target="#survey-modal" style="float:right"><i class="nav-icon fas fa-plus"></i> Add List</button></a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">Masterlist of Farmers</th>
                                <th colspan="14" class="text-center bg-yellow">Crops Area/ sq/ mtr</th>
                            </tr>
                            <tr>
                                <th width="10%">Name of Farmer</th>
                                <th width="8%">Location of Farm</th>
                                <th width="4%">Talong</th>
                                <th width="4%">Balatong</th>
                                <th width="4%">Okra</th>
                                <th width="4%">Upo</th>
                                <th width="4%">Sili</th>
                                <th width="4%">Ampalaya</th>
                                <th width="4%">Pechay</th>
                                <th width="4%">Pipino</th>
                                <th width="4%">Patola</th>
                                <th width="4%">Tomato</th>
                                <th width="4%">Kalabasa</th>
                                <th width="4%">Mango</th>
                                <th width="7%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($crops as $crop)
                            <tr>
                                <td>Internet Explorer 4.0</td>
                                <td>Trident</td>
                                <td>{{$crop->talong}}</td>
                                <td>{{$crop->balatong}}</td>
                                <td>{{$crop->okra}}</td>
                                <td>{{$crop->upo}}</td>
                                <td>{{$crop->sili}}</td>
                                <td>{{$crop->ampalaya}}</td>
                                <td>{{$crop->pechay}}</td>
                                <td>{{$crop->pipino}}</td>
                                <td>{{$crop->patola}}</td>
                                <td>{{$crop->tomato}}</td>
                                <td>{{$crop->kalabasa}}</td>
                                <td>{{$crop->mango}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#update-modal{{ $crop->id }}"><i class="fa fa-edit"></i></button>
                                    <!-- Update Modal -->
                                    <div class="modal fade" id="update-modal{{ $crop->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h4 class="modal-title">Crops Update</h4>
                                                    <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" id="createLivestock" action="{{ url('crop/update/' .$crop->id) }}" class="needs-validation">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group col-md-6">
                                                            <label>Name:</label>
                                                            <input type="text" name="event_name" value="" class="form-control" id="validationServer" aria-describedby="validationServerFeedback" disabled>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Location of Farm</label>
                                                            <input type="text" name="event_name" value="" class="form-control" id="validationServer" aria-describedby="validationServerFeedback" disabled>
                                                        </div>
                                                        <div class="row" style="display: flex; justify-content: center; align-items: center; ">
                                                            <div class="form-group col-md-2" >
                                                                <label>Talong:</label>
                                                                <input type="text" class="form-control" name="talong" value="{{ $crop->talong }}">
                                                            </div>
                                                            <div class="form-group col-md-2" >
                                                                <label>Balatong:</label>
                                                                <input type="text" class="form-control" name="balatong" value="{{ $crop->balatong }}">
                                                            </div>
                                                            <div class="form-group col-md-2" >
                                                                <label>Okra:</label>
                                                                <input type="text" class="form-control" name="okra" value="{{ $crop->okra }}">
                                                            </div>
                                                            <div class="form-group col-md-2" >
                                                                <label>Upo:</label>
                                                                <input type="text" class="form-control" name="upo" value="{{ $crop->upo }}">
                                                            </div>
                                                        </div>
                                                        <div class="row" style="display: flex; justify-content: center; align-items: center;" >
                                                            <div class="form-group col-md-2" >
                                                                <label>Sili:</label>
                                                                <input type="text" class="form-control" name="sili" value="{{ $crop->sili }}">
                                                            </div>
                                                            <div class="form-group col-md-2" >
                                                                <label>Ampalaya:</label>
                                                                <input type="text" class="form-control" name="ampalaya" value="{{ $crop->ampalaya }}">
                                                            </div>
                                                            <div class="form-group col-md-2" >
                                                                <label>Pechay:</label>
                                                                <input type="text" class="form-control" name="pechay" value="{{ $crop->pechay }}">
                                                            </div>
                                                            <div class="form-group col-md-2" >
                                                                <label>Pipino:</label>
                                                                <input type="text" class="form-control" name="pipino" value="{{ $crop->pipino }}">
                                                            </div>
                                                            <div class="form-group col-md-2" >
                                                                <label>Patola:</label>
                                                                <input type="text" class="form-control" name="patola" value="{{ $crop->patola }}">
                                                            </div>
                                                        </div>
                                                        <div class="row" style="display: flex; justify-content: center; align-items: center;" >
                                                            <div class="form-group col-md-2" >
                                                                <label>Tomato:</label>
                                                                <input type="text" class="form-control" name="tomato" value="{{ $crop->tomato }}">
                                                            </div>
                                                            <div class="form-group col-md-2" >
                                                                <label>Kalabasa:</label>
                                                                <input type="text" class="form-control" name="kalabasa" value="{{ $crop->kalabasa }}">
                                                            </div>
                                                            <div class="form-group col-md-2" >
                                                                <label>Mango:</label>
                                                                <input type="text" class="form-control" name="mango" value="{{ $crop->mango }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="responseMessage"></div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modal-danger{{$crop->id}}">
                                        <i class="nav-icon fas fa-trash"></i>
                                    </button>
                                    <div class="modal fade" id="modal-danger{{$crop->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Permanently Delete Record?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('delete/crop/'.$crop->id) }}">
                                                    <div class="modal-body" id="modal-danger">
                                                        <p>Are you sure you want to delete this Crop?</p>
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

<!-- Modal to Add -->
<div class="modal fade" id="survey-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Livestock and Poultry survey</h4>
                <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="createLivestock" action="{{ route('store.crop') }}" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="form-group col-md-6">
                        <label>Name:</label>
                        <input type="text" name="event_name" value="" class="form-control" id="validationServer" aria-describedby="validationServerFeedback" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Location of Farm</label>
                        <input type="text" name="event_name" value="" class="form-control" id="validationServer" aria-describedby="validationServerFeedback" disabled>
                    </div>
                    <div class="row" style="display: flex; justify-content: center; align-items: center; ">
                        <div class="form-group col-md-2" >
                            <label>Talong:</label>
                            <input type="text" class="form-control" name="talong">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Balatong:</label>
                            <input type="text" class="form-control" name="balatong">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Okra:</label>
                            <input type="text" class="form-control" name="okra">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Upo:</label>
                            <input type="text" class="form-control" name="upo">
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: center; align-items: center;" >
                        <div class="form-group col-md-2" >
                            <label>Sili:</label>
                            <input type="text" class="form-control" name="sili">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Ampalaya:</label>
                            <input type="text" class="form-control" name="ampalaya">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Pechay:</label>
                            <input type="text" class="form-control" name="pechay">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Pipino:</label>
                            <input type="text" class="form-control" name="pipino">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Patola:</label>
                            <input type="text" class="form-control" name="patola">
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: center; align-items: center;" >
                        <div class="form-group col-md-2" >
                            <label>Tomato:</label>
                            <input type="text" class="form-control" name="tomato">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Kalabasa:</label>
                            <input type="text" class="form-control" name="kalabasa">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Mango:</label>
                            <input type="text" class="form-control" name="mango">
                        </div>
                    </div>
                </div>
                <div id="responseMessage"></div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="submited" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection