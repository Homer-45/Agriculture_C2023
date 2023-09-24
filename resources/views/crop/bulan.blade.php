@extends('front_master')
@section('content')
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2 mb-3"><b>Crops Information</b></h1>
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
                </div>
                <div class="card-body">
                <form method="GET" action="{{ route('bulan.crop') }}" class="remove">
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
                                <a href="{{ route('crop.export', request()->all()) }}" class="btn btn-info btn-sm">Export</a>
                            </div>
                            <div class="ml-2">
                                <a href="/bulan/crop" class="btn btn-success btn-sm pull-right"><i class="fas fa-sync-alt"></i> Refresh</a>
                            </div>
                        </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">Masterlist of Farmers</th>
                                <th colspan="14" class="text-center bg-yellow">Crops Area/ sq/ mtr</th>
                            </tr>
                            <tr>
                                <th width="10%">Barangay</th>
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
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($cropCounts as $cropCount)
                            <tr>
                                <td>{{ $i++ }}. {{$cropCount->brgy_name}}</td>
                                <td>{{$cropCount->talong_sum}}</td>
                                <td>{{$cropCount->balatong_sum}}</td>
                                <td>{{$cropCount->okra_sum}}</td>
                                <td>{{$cropCount->upo_sum}}</td>
                                <td>{{$cropCount->sili_sum}}</td>
                                <td>{{$cropCount->ampalaya_sum}}</td>
                                <td>{{$cropCount->pechay_sum}}</td>
                                <td>{{$cropCount->pipino_sum}}</td>
                                <td>{{$cropCount->patola_sum}}</td>
                                <td>{{$cropCount->tomato_sum}}</td>
                                <td>{{$cropCount->kalabasa_sum}}</td>
                                <td>{{$cropCount->mango_sum}}</td>
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
@endsection