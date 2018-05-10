@extends('layouts.master')
@section('title', 'Detail Guru')
@section('sidebar')
    @parent
@endsection

@section('content')
<h2 class="page-header">{{$teacher->Nama}}</h2>
<div class="panel panel-default">
  <div class="panel-heading">
      Detail | <a href="/teachers" class="btn btn-danger btn-xs">Back</a>
  </div>
  <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <form role="form" action="/teachers" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                  <label>NIP</label>
                  <input class="form-control" placeholder="Nomor Induk Siswa" value="{{$teacher->NIP}}" name="nis" disabled>
              </div>
              <div class="form-group">
                  <label>Place of birth</label>
                  <input class="form-control" placeholder="Tempat Lahir" value="{{$teacher->Tempat_lahir}}" name="tmp_lahir" disabled>
              </div>
              <div class="form-group">
                  <label>Date of birth</label>
                  <input class="form-control" placeholder="Tanggal Lahir" value="{{$teacher->Tanggal_lahir}}" name="tgl_lahir" disabled>
              </div>
              <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" placeholder="Alamat Tinggal" value="{{$teacher->Alamat}}" name="alamat" disabled>
              </div>
              <div class="form-group">
                  <label>Father's Name</label>
                  <input class="form-control" placeholder="Nama Ayah" value="{{$teacher->Nama_ayah}}" name="ayah" disabled>
              </div>
              <div class="form-group">
                  <label>Mother's Name</label>
                  <input class="form-control" placeholder="Nama Ibu" value="{{$teacher->Nama_ibu}}" name="ibu" disabled>
              </div>
              <div class="form-group">
                  <label>Education</label>
                  <input class="form-control" placeholder="Pendidikan" value="{{$teacher->Pendidikan}}" name="pendidikan" disabled>
              </div>
              <div class="form-group">
                  <label>Departement</label>
                  <input class="form-control" placeholder="Jurusan" value="{{$teacher->Jurusan}}" name="jurusan" disabled>
              </div>
              <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" placeholder="No. Telepon" value="{{$teacher->Telepon}}" name="no_telp" disabled>
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="Email" value="{{$teacher->email}}" name="email" disabled>
              </div>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
