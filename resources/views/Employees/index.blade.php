@extends('Layouts.master')

@section('content')
<div class="main">
    <div class="main-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Pegawai </h3>

                            <div class="right">
                                <a type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">{{__('msg.add data')}}</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>NAMA PEGAWAI</th>
                                        <th>STATUS</th>
                                        <th>TANGGAL LAHIR</th>
                                        <th>EMAIL</th>
                                        <th>FOTO</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>ALAMAT</th>
                                        <th>NAMA TUGAS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataemployees as $employees)
                                    <tr>
                                        <td>{{$employees->nip}}</td>
                                        <td>{{$employees->name}}</td>
                                        <td>{{$employees->status}}</td>
                                        <td>{{Carbon\Carbon::parse($employees->tanggal_lahir)->format('d-m-Y')}}</td>
                                        <td>{{$employees->email}}</td>
                                        <td>{{$employees->photo}}</td>
                                        <td>{{$employees->jenis_kelamin}}</td>
                                        <td>{{$employees->alamat}}</td>
                                        <td>{{$employees->nama_tugas}}</td>
                                        <td>
                                            <a href="/employees/{{$employees->id}}/edit" class="btn btn-warning btn-sm">Edit</a>

                                            <a href="/employees/{{$employees->id}}/delete" class="btn btn-danger btn-sm delete" onclick="return confirm('Yakin ingin menghapus')">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="\employees\create" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group{{$errors->has('nip') ? ' has-error' : ''}}">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Nip">Nip</label>
                            </div>
                            <div class="col-sm-9">
                                <input name="nip" type="text" class="form-control" id="Nip" placeholder="Nip" value="{{old('nip')}}">
                                @if($errors->has('nip'))
                                <span class="help-block">{{$errors->first('nip')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Nama">Nama</label>
                            </div>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" id="Nama" placeholder="Nama Belakang" value="{{old('nama')}}">
                                @if($errors->has('nama'))
                                <span class="help-block">{{$errors->first('nama')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class=" form-group{{$errors->has('status') ? ' has-error' : ''}}">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Status">Status</label>
                            </div>
                            <div class="col-sm-9">
                                <input name="status" type="text" class="form-control" id="Status" placeholder="Status" value="{{old('status')}}">
                                @if($errors->has('status'))
                                <span class=" help-block">{{$errors->first('status')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class=" form-group{{$errors->has('tanggal_lahir') ? ' has-error' : ''}}">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="Tanggal Lahir">Tanggal Lahir</label>
                            </div>
                            <div class="col-sm-9">
                                <input name="tanggal_lahir" type="date" class="form-control" id="Tanggal Lahir" placeholder="Tanggal Lahir" value="{{old('tanggal_lahir')}}">
                                @if($errors->has('tanggal_lahir'))
                                <span class=" help-block">{{$errors->first('tanggal_lahir')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Email">Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input name="email" type="email" class="form-control" id="Email" placeholder="Email" value="{{old('email')}}">
                                @if($errors->has('email'))
                                <span class=" help-block">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{$errors->has('photo') ? ' has-error' : ''}}">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Photo">Foto</label>
                            </div>
                            <div class="col-sm-9">
                                <input name="photo" type="file" class="form-control" id="Photo">
                                @if($errors->has('photo'))
                                <span class="help-block">{{$errors->first('photo')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            </div>
                            <div class="col-sm-9">
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="L" {{(old('jenis_kelamin') == 'L')? ' selected': ''}}>Laki-Laki</option>
                                    <option value="P" {{(old('jenis_kelamin') == 'P')? ' selected': ''}}>Perempuan</option>
                                </select>
                                @if($errors->has('jenis_kelamin'))
                                <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Alamat">Alamat</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="alamat" class="form-control" id="Alamat" rows="3" value="{{old('alamat')}}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3" style="margin-top:5px;">
                                <label for="Nama Tugas">Tugas</label>
                            </div>
                            <div class="col-sm-9">
                                <select name="tugas_id" id="tugas_id" class="form-control">
                                    <option value="1">Test0</option>
                                    <option value="2">Test1</option>
                                </select>
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
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
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