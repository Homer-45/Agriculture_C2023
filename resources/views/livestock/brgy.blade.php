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
                    <a><button class="btn btn-success float-sm-right" data-toggle="modal" data-target="#survey-modal" style="float:right"><i class="nav-icon fas fa-plus"></i> Add List</button></a>
                    <!-- <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#modal-lg">
                    Launch Large Modal
                    </button> -->
                </div>
                <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th colspan="4"></th>
                                <th colspan="2" class="text-center">Swine</th>
                                <th colspan="2"></th>
                                <th colspan="3" class="text-center">Chicken</th>
                                <th colspan="2" class="text-center">Ducks</th>
                                <th colspan="6"></th>
                            </tr>
                            <tr>
                                <th width="1%">#</th>
                                <th width="11%">Barangay</th>


                                <th width="5%">Carabao</th>
                                <th width="5%">Cattle</th>
                                <!-- Swine -->
                                <th width="5%">Breeder</th>
                                <th width="5%">Fattener</th>

                                <th width="4%">Goat</th>
                                <th width="4%">Sheep</th>
                                <!-- Chicken -->
                                <th width="4%">Broiler</th>
                                <th width="4%">Layer</th>
                                <th width="4%">Native</th>
                                <!-- Ducks -->
                                <th width="5%">Muscovy</th>
                                <th width="5%">Mallard</th>
                                
                                <th width="4%">Turkey</th>
                                <th width="4%">Geese</th>
                                <th width="4%">Quail</th>
                                <th width="4%">Dog</th>
                                <th width="4%">Horse</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($livestocks as $livestock)
                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td></td>
                                <td>{{$livestock->carabao}}</td>
                                <td>{{$livestock->cattle}}</td>
                                <td>{{$livestock->breeder}}</td>
                                <td>{{$livestock->fattener}}</td>
                                <td>{{$livestock->goat}}</td>
                                <td>{{$livestock->sheep}}</td>
                                <td>{{$livestock->broiler}}</td>
                                <td>{{$livestock->layer}}</td>
                                <td>{{$livestock->native}}</td>
                                <td>{{$livestock->muscovy}}</td>
                                <td>{{$livestock->mallard}}</td>
                                <td>{{$livestock->turkey}}</td>
                                <td>{{$livestock->geese}}</td>
                                <td>{{$livestock->quail}}</td>
                                <td>{{$livestock->dog}}</td>
                                <td>{{$livestock->horse}}</td>
                                
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
<!-- Modal to Survey -->
<div class="modal fade" id="survey-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Livestock and Poultry survey</h4>
                <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="createLivestock" action="{{ route('submit-form') }}" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="form-group col-md-7">
                        <label>Name:</label>
                        <input type="text" name="event_name" value="" class="form-control" id="validationServer" aria-describedby="validationServerFeedback" disabled>
                    </div>
                    <div class="row" style="display: flex; justify-content: center; align-items: center; ">
                        <div class="form-group col-md-2" >
                            <label>Carabao:</label>
                            <input type="text" class="form-control" name="carabao">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Cattle:</label>
                            <input type="text" class="form-control" name="cattle">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Breeder:</label>
                            <input type="text" class="form-control" name="breeder">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Fattener:</label>
                            <input type="text" class="form-control" name="fattener">
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: center; align-items: center;" >
                        <div class="form-group col-md-2" >
                            <label>Goat:</label>
                            <input type="text" class="form-control" name="goat">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Sheep:</label>
                            <input type="text" class="form-control" name="sheep">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Broiler:</label>
                            <input type="text" class="form-control" name="broiler">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Layer:</label>
                            <input type="text" class="form-control" name="layer">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Native:</label>
                            <input type="text" class="form-control" name="native">
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: center; align-items: center;" >
                        <div class="form-group col-md-2" >
                            <label>Muscovy:</label>
                            <input type="text" class="form-control" name="muscovy">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Mallard:</label>
                            <input type="text" class="form-control" name="mallard">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Turkey:</label>
                            <input type="text" class="form-control" name="turkey">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Geese:</label>
                            <input type="text" class="form-control" name="geese">
                        </div>
                    </div>
                    <div class="row" style="display: flex; justify-content: center; align-items: center;" >
                        <div class="form-group col-md-2" >
                            <label>Quail:</label>
                            <input type="text" class="form-control" name="quail">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Dog:</label>
                            <input type="text" class="form-control" name="dog">
                        </div>
                        <div class="form-group col-md-2" >
                            <label>Horse:</label>
                            <input type="text" class="form-control" name="horse">
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
@push('js')
<script src="{{ asset ('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- resources/views/modal.blade.php -->
<script>
    $(document).ready(function () {
        var modal = $("#survey-modal");
        var form = $("#createLivestock");

        // Open modal
        $("#openModalBtn").click(function () {
            modal.show();
        });

        form.submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('submit-form') }}",
                data: form.serialize(),
                success: function (response) {
                    $("#responseMessage").text(response.message);                    
                    form.get(0).reset();
                    modal.find('.close').trigger('click');
                    
                },
                error: function (error) {
                    $("#responseMessage").text("An error occurred.");
                }
            });
        });
    });
</script>
<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "ordering": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endpush
@endsection