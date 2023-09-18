@extends('front_master')
@section('content')
<!-- Content Header (Page header) --> 
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2 mb-3"><b>Livestock Information</b></h1>
                <!-- buttons list -->
                <nav>
                    <ol>
                        <a href="{{ route('add.livestock') }}"><button class="btn btn-success"><i class="nav-icon fas fa-plus"></i> Add List</button></a>
                        &nbsp; &nbsp; &nbsp;
                        <a href="{{ route('import.livestock') }}"><button class="btn btn-warning"> Import</button></a>
                        &nbsp; &nbsp; &nbsp;
                        <a href="{{ route('livestock.export') }}"><button class="btn btn-danger"> Export</button></a>
                    </ol>
                </nav>
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
                <div class="card-header bg-dark d-flat">
                    <h3 class="card-title mt-2">List Livestock and Poultry</h3>
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
                                <th width="10%">Barangay</th>


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

                            <tr>
                                <td>{{ $carabaoCounts }}</td>
                                <td>Internet Explorer Explorer 4.0</td>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@push('js')
<script src="{{ asset ('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

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
