@extends('front_master')
@section('content')
<!-- Content Header (Page header) --> 
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2 mb-3"><b>Livestock Information</b></h1>
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
                    <form method="GET" action="{{ route('bulan.livestock') }}" class="remove">
                        @csrf
                        <div class="row">
                            <div class="ml-2">
                                <p>Filter Date By:</p>
                            </div>
                            <div class="col-sm-2 col-md-offset-2 mb-1">
                                <input type="date" class="form-control form-control-sm" name="fdate" id="fdate" value="{{ request('fdate') }}" required>
                            </div>
                            <div>
                                <h5>To</h5>
                            </div>
                            <div class="col-sm-2 col-md-offset-2 mb-1">
                                <input type="date" class="form-control form-control-sm" name="sdate" id="sdate" value="{{ request('sdate') }}" required>
                            </div>
                            <div class="ml-1">
                                <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                            </div>
                    </form>
                            <div class="ml-2">
                                <a href="{{ route('livestock.export', request()->all()) }}" class="btn btn-info btn-sm">Export</a>
                            </div>
                            <div class="ml-2">
                                <a href="/bulan/livestock" class="btn btn-success btn-sm pull-right"><i class="fas fa-sync-alt"></i> Refresh</a>
                            </div>
                        </div>
                    
                    
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
                            @foreach ($livestockCounts as $livestockCount)
                            <tr>
                                <td>#</td>
                                <td>{{ $livestockCount->brgy_name }}</td>
                                <td>{{ $livestockCount->carabao_sum }}</td>
                                <td>{{ $livestockCount->cattle_sum }}</td>
                                <td>{{ $livestockCount->breeder_sum }}</td>
                                <td>{{ $livestockCount->fattener_sum }}</td>
                                <td>{{ $livestockCount->goat_sum }}</td>
                                <td>{{ $livestockCount->sheep_sum }}</td>
                                <td>{{ $livestockCount->broiler_sum }}</td>
                                <td>{{ $livestockCount->layer_sum }}</td>
                                <td>{{ $livestockCount->native_sum }}</td>
                                <td>{{ $livestockCount->muscovy_sum }}</td>
                                <td>{{ $livestockCount->mallard_sum }}</td>
                                <td>{{ $livestockCount->turkey_sum }}</td>
                                <td>{{ $livestockCount->geese_sum }}</td>
                                <td>{{ $livestockCount->quail_sum }}</td>
                                <td>{{ $livestockCount->dog_sum }}</td>
                                <td>{{ $livestockCount->horse_sum }}</td>
                            </tr>
                            @endforeach
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
