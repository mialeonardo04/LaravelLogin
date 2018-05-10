@extends('layouts.master')
@section('title', 'Edit Data Guru')
@section('sidebar')
    @parent
@endsection

@section('content')
<h2 class="page-header">Edit data</h2>
<div class="panel panel-default">
  <div class="panel-heading">
      Update data here| <a href="/teachers" class="btn btn-danger btn-xs">Back</a>
  </div>
  <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <form role="form" action="/teachers/{{$teacher->NIP}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="put">
              <div class="form-group">
                  <label>NIP</label>
                  <input class="form-control" placeholder="Nomor Induk Pegawai" value="{{$teacher->NIP}}" name="nip">
                  {{ ($errors->has('nip')) ? $errors->first('nip') : '' }}
              </div>
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" placeholder="Nama Lengkap" value="{{$teacher->Nama}}" name="nama">
                  {{ ($errors->has('nama')) ? $errors->first('nama') : '' }}
              </div>
              <div class="form-group">
                  <label>Place of birth</label>
                  <input class="form-control" placeholder="Tempat Lahir" value="{{$teacher->Tempat_lahir}}" name="tmp_lahir">
                  {{ ($errors->has('tmp_lahir')) ? $errors->first('tmp_lahir') : '' }}
              </div>
              <div class="form-group">
                  <label>Date of birth</label>
                  <input class="form-control" placeholder="Tanggal Lahir" value="{{$teacher->Tanggal_lahir}}" name="tgl_lahir">
                  {{ ($errors->has('tgl_lahir')) ? $errors->first('tgl_lahir') : '' }}
              </div>
              <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" placeholder="Alamat Tinggal" value="{{$teacher->Alamat}}" name="alamat">
                  {{ ($errors->has('alamat')) ? $errors->first('alamat') : '' }}
              </div>
              <div class="form-group">
                  <label>Father's Name</label>
                  <input class="form-control" placeholder="Nama Ayah" value="{{$teacher->Nama_ayah}}" name="ayah">
                  {{ ($errors->has('ayah')) ? $errors->first('ayah') : '' }}
              </div>
              <div class="form-group">
                  <label>Mother's Name</label>
                  <input class="form-control" placeholder="Nama Ibu" value="{{$teacher->Nama_ibu}}" name="ibu">
                  {{ ($errors->has('ibu')) ? $errors->first('ibu') : '' }}
              </div>
              <div class="form-group">
                  <label>Education</label>
                  <input class="form-control" placeholder="Pendidikan" value="{{$teacher->Pendidikan}}" name="pendidikan">
                  {{ ($errors->has('pendidikan')) ? $errors->first('pendidikan') : '' }}
              </div>
              <div class="form-group">
                  <label>Departement</label>
                  <input class="form-control" placeholder="Jurusan" value="{{$teacher->Jurusan}}" name="jurusan">
                  {{ ($errors->has('jurusan')) ? $errors->first('jurusan') : '' }}
              </div>
              <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" placeholder="Telepon" value="{{$teacher->Telepon}}" name="no_telp">
                  {{ ($errors->has('no_telp')) ? $errors->first('no_telp') : '' }}
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="Email" value="{{$teacher->email}}" name="email">
                  {{ ($errors->has('email')) ? $errors->first('email') : '' }}
              </div>
              <button type="submit" name="name" value="edit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
