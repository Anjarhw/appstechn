@extends('Layouts.master')

@section('content')
<div class="main">
    <div class="main-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Pegawai</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/employees/{{$employees->id}}/update" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{$errors->has('nip') ? ' has-error' : ''}}">
                                            <label for="Nip">Nip</label>
                                            <input name="nip" type="text" class="form-control" id="Nip" placeholder="Nip" value="{{$employees->nip}}">
                                            @if($errors->has('nip'))
                                            <span class="help-block">{{$errors->first('nip')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
                                            <label for="Nama">Nama</label>
                                            <input name="name" type="text" class="form-control" id="Nama" placeholder="Nama Belakang" value="{{$employees->name}}">
                                            @if($errors->has('nama'))
                                            <span class="help-block">{{$errors->first('nama')}}</span>
                                            @endif
                                        </div>
                                        <div class=" form-group{{$errors->has('status') ? ' has-error' : ''}}">
                                            <label for="Status">Status</label>
                                            <input name="status" type="text" class="form-control" id="Status" placeholder="Status" value="{{$employees->status}}">
                                            @if($errors->has('status'))
                                            <span class=" help-block">{{$errors->first('status')}}</span>
                                            @endif
                                        </div>
                                        <div class=" form-group{{$errors->has('tanggal_lahir') ? ' has-error' : ''}}">
                                            <label for="Tanggal Lahir">Tanggal Lahir</label>
                                            <input name="tanggal_lahir" type="date" class="form-control" id="Tanggal Lahir" placeholder="Tanggal Lahir" value="{{$date}}">
                                            @if($errors->has('tanggal_lahir'))
                                            <span class=" help-block">{{$errors->first('tanggal_lahir')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
                                            <label for="Email">Email</label>
                                            <input name="email" type="email" class="form-control" id="Email" placeholder="Email" value="{{$employees->email}}">
                                            @if($errors->has('email'))
                                            <span class=" help-block">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{$errors->has('photo') ? ' has-error' : ''}}">
                                            <label for="Photo">Foto</label>
                                            <input name="photo" type="file" class="form-control" id="Photo">
                                            @if($errors->has('photo'))
                                            <span class="help-block">{{$errors->first('photo')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="L" @if($employees->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                                <option value="P" @if($employees->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                            </select>
                                            @if($errors->has('jenis_kelamin'))
                                            <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="Alamat">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="Alamat" rows="3">{{$employees->alamat}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Nama Tugas">Tugas</label>
                                            <select name="tugas_id" id="tugas_id" class="form-control">
                                                <!-- <option value="1" @if($employees->id_tugas == 1) selected @endif>Test0</option>
                                                <option value="2" @if($employees->id_tugas == 2) selected @endif>Test1</option> -->
                                                <option value="0" selected="true">Pilih Tugas</option>
                                                @foreach($tasks as $key)
                                                <option value="{{$key->id}}" {{$key->id == $selectedIdTasks ? 'selected="selected"' : ''}} @if($employees->tugas_id == $key->id) selected @endif>{{$key->nama_tugas}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Role">Role</label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="admin" @if($takerole->role =='admin' ) selected @endif>Admin</option>
                                                <option value="pegawai" @if($takerole->role =='pegawai' ) selected @endif>Pegawai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-warning col-md-2 pull-right">Update</button>
                                </div>
                        </div>
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
@stop

@section('footer')

@stop