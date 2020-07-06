@extends('Layouts.master')

@section('content')
<div class="main">
    <div class="main-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Tugas Saya</h3>
                        </div>
                        <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NAMA TUGAS</th>
                                        <th>STATUS PEKERJAAN</th>
                                        <th>TANGGAL</th>
                                        <th>PIC KARYAWAN</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datatasks as $tasks)
                                    <tr>
                                        <td>{{$tasks->nama_tugas}}</td>
                                        <td>{{$tasks->status_pekerjaan}}</td>
                                        <td>{{$tasks->tanggal}}</td>
                                        <td>{{$tasks->pic_karyawan}}</td>
                                        <td>{{$tasks->keterangan}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')

@stop