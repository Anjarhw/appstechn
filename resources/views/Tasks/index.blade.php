@extends('Layouts.master')

@section('content')
<div class="main">
    <div class="main-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Tugas</h3>
                            <div class="right">
                                <a type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{__('msg.task name')}}</th>
                                        <th>STATUS PEKERJAAN</th>
                                        <th>TANGGAL MULAI</th>
                                        <th>TANGGAL AKHIR</th>
                                        <th>PIC KARYAWAN</th>
                                        <th>KETERANGAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datatasks as $tasks)
                                    <tr>
                                        <td>{{$tasks->nama_tugas}}</td>
                                        <td>{{$tasks->status_pekerjaan}}</td>
                                        <td>{{$tasks->tanggal_mulai->format('d-m-Y')}}</td>
                                        <td>{{$tasks->tanggal_akhir->format('d-m-Y')}}</td>
                                        <td>{{$tasks->pic_karyawan}}</td>
                                        <td>{{$tasks->keterangan}}</td>
                                        <td>
                                            <a href="/tasks/{{$tasks->id}}/edit" class="btn btn-warning btn-sm">Edit</a>

                                            <a href="/tasks/{{$tasks->id}}/delete" class="btn btn-danger btn-sm delete" onclick="return confirm('Yakin ingin menghapus')">Delete</a>
                                        </td>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="\tasks\create" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class=" form-group{{$errors->has('kode') ? ' has-error' : ''}}">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Nama Tugas">Nama Tugas</label>
                            </div>
                            <div class="col-sm-9">
                                <input name="nama_tugas" type="text" class="form-control" id="Nama Tugas" placeholder="Nama Tugas" value="{{old('nama_tugas')}}">
                                @if($errors->has('nama_tugas'))
                                <span class="help-block">{{$errors->first('nama_tugas')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{$errors->has('status_pekerjaan') ? ' has-error' : ''}}">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Status Pekerjaan">Status Pekerjaan</label>
                            </div>
                            <div class="col-sm-9">
                                <input name="status_pekerjaan" type="text" class="form-control" id="status_pekerjaan" placeholder="Status Pekerjaan" value="{{old('status_pekerjaan')}}">
                                @if($errors->has('status_pekerjaan'))
                                <span class="help-block">{{$errors->first('status_pekerjaan')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Tanggal">Tanggal Mulai</label>
                            </div>
                            <div class="col-sm-3">
                                <input name="tanggal_mulai" type="date" class="form-control" id="Tanggal Mulai" value="{{old('tanggal_mulai')}}">
                                @if($errors->has('tanggal_mulai'))
                                <span class=" help-block">{{$errors->first('tanggal_mulai')}}</span>
                                @endif
                            </div>
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Tanggal Akhir">Tanggal Akhir</label>
                            </div>
                            <div class="col-sm-3">
                                <input name="tanggal_akhir" type="date" class="form-control" id="Tanggal Akhir" value="{{old('tanggal_akhir')}}">
                                @if($errors->has('tanggal_akhir'))
                                <span class=" help-block">{{$errors->first('tanggal_akhir')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class=" form-group{{$errors->has('pic_karyawan') ? ' has-error' : ''}}">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Pic Karyawan">Pic Karyawan</label>
                            </div>
                            <div class="col-sm-9">
                                <input name="pic_karyawan" type="text" class="form-control" id="Pic Karyawan" placeholder="Pic Karyawan" value="{{old('pic_karyawan')}}">
                                @if($errors->has('pic_karyawan'))
                                <span class=" help-block">{{$errors->first('pic_karyawan')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Keterangan">Keterangan</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="keterangan" class="form-control" id="Keterangan" rows="3" value="{{old('Keterangan')}}"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class=" modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('footer')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@stop