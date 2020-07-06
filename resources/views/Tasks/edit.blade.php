@extends('Layouts.master')

@section('content')
<div class="main">
    <div class="main-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Tugas</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/tasks/{{$tasks->id}}/update" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{$errors->has('kode') ? ' has-error' : ''}}">
                                            <label for="Kode">Nip</label>
                                            <input name="kode" type="text" class="form-control" id="Kode" placeholder="Kode" value="{{$tasks->kode}}">
                                            @if($errors->has('kode'))
                                            <span class="help-block">{{$errors->first('kode')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{$errors->has('nama_tugas') ? ' has-error' : ''}}">
                                            <label for="Nama Tugas">Nama Tugas</label>
                                            <input name="nama_tugas" type="text" class="form-control" id="Nama Tugas" placeholder="Nama Tugas" value="{{$tasks->nama_tugas}}">
                                            @if($errors->has('nama_tugas'))
                                            <span class="help-block">{{$errors->first('nama_tugas')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{$errors->has('status_pekerjaan') ? ' has-error' : ''}}">
                                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                            <select class="form-control" id="status_pekerjaan" name="status_pekerjaan">
                                                <option value="Aktif" @if($tasks->status_pekerjaan == 'L') selected @endif>Laki-Laki</option>
                                                <option value="Tidak Aktif" @if($tasks->status_pekerjaan == 'P') selected @endif>Perempuan</option>
                                            </select>
                                            @if($errors->has('status_pekerjaan'))
                                            <span class="help-block">{{$errors->first('status_pekerjaan')}}</span>
                                            @endif
                                        </div>
                                        <div class=" form-group{{$errors->has('tanggal') ? ' has-error' : ''}}">
                                            <label for="Tanggal">Tanggal</label>
                                            <input name="tanggal" type="date" class="form-control" id="Tanggal" value="{{$date}}">
                                            @if($errors->has('tanggal'))
                                            <span class=" help-block">{{$errors->first('tanggal')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{$errors->has('pic_karyawan') ? ' has-error' : ''}}">
                                            <label for="Pic Karyawan">Pic Karyawan</label>
                                            <input name="pic_karyawan" type="text" class="form-control" id="Pic Karyawan" placeholder="Pic Karyawan" value="{{$tasks->pic_karyawan}}">
                                            @if($errors->has('pic_karyawan'))
                                            <span class="help-block">{{$errors->first('pic_karyawan')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="Alamat">Alamat</label>
                                            <textarea name="keterangan" class="form-control" id="Alamat" rows="3">{{$tasks->keterangan}}</textarea>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-warning col-md-4 pull-right">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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