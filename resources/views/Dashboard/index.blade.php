@extends('Layouts.master')

@section('content')
<div class="main">
    <div class="main-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Halo {{auth()->user()->username}}
                                @if (auth()->user()->role == 'admin')
                                as Admin
                                @endif
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <img src="{{auth()->user()->employees->getPhoto()}}" class="img-circle" style="width:250px;height:250px;" alt="Photo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @if (auth()->user()->role == 'admin')
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Jumlah User</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-6">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-download"></i></span>
                                    <p>
                                        <span class="number">{{jumlahTotalPegawai()}}</span>
                                        <span class="title">Admin</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                    <p>
                                        <span class="number">{{jumlahTotalPegawai()}}</span>
                                        <span class="title">Pegawai</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
            <br>
            <div class="row">
                @if (auth()->user()->role == 'admin')
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Nama Pegawai Aktif</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NAMA PEGAWAI</th>
                                        <th>STATUS</th>
                                        <th>TUGAS</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employeestasks as $dataemp)
                                    <tr>
                                        <td>{{$dataemp->name}}</td>
                                        <td>{{$dataemp->status}}</td>
                                        <td>{{$dataemp->nama_tugas}}</td>
                                        <td>{{$dataemp->keterangan}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="chartstatuss"></div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    var chart = Highcharts.chart('chartstatuss', {

        title: {
            text: 'Laporan Pegawai'
        },

        subtitle: {
            text: 'Pegawai Aktif dan Tugas Aktif'
        },

        xAxis: {
            categories: ['Pegawai Aktif', 'Tugas Aktif']
        },

        series: [{
            type: 'column',
            colorByPoint: true,
            // data: [3, 7],
            data: <?php echo json_encode($status);
                    ?>,
            showInLegend: false
        }]
    });
</script>
@stop