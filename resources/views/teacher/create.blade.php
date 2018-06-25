@extends('layouts.master')
@section('title', 'Input Data Guru')
@section('sidebar')
    @parent
@endsection

@section('content')
@section('content')
@if(Session::has('message'))
    <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('message') }}</div>
@endif
<h2 class="page-header">Create new data</h2>
<div class="panel panel-default">
  <div class="panel-heading">
      Input data here| <a href="/teachers" class="btn btn-danger btn-xs">Back</a>
  </div>
  <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <form role="form" action="/teachers" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                  <label>NIP</label>
                  <input class="form-control" placeholder="Nomor Induk Pegawai" name="nip">
                  {{ ($errors->has('nip')) ? $errors->first('nip') : '' }}
              </div>
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" placeholder="Nama Lengkap" name="nama">
                  {{ ($errors->has('nama')) ? $errors->first('nama') : '' }}
              </div>
              <div class="form-group">
                  <label>Place of birth</label>
                  <input class="form-control" placeholder="Tempat Lahir" name="tmp_lahir">
                  {{ ($errors->has('tmp_lahir')) ? $errors->first('tmp_lahir') : '' }}
              </div>
              <div class="form-group">
                  <label>Date of birth</label>
                  <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir">
                  {{ ($errors->has('tgl_lahir')) ? $errors->first('tgl_lahir') : '' }}
              </div>
              <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" placeholder="Alamat Tinggal" name="alamat">
                  {{ ($errors->has('alamat')) ? $errors->first('alamat') : '' }}
              </div>
              <div class="form-group">
                  <label>Father's Name</label>
                  <input class="form-control" placeholder="Nama Ayah" name="ayah">
                  {{ ($errors->has('ayah')) ? $errors->first('ayah') : '' }}
              </div>
              <div class="form-group">
                  <label>Mother's Name</label>
                  <input class="form-control" placeholder="Nama Ibu" name="ibu">
                  {{ ($errors->has('ibu')) ? $errors->first('ibu') : '' }}
              </div>
              <div class="form-group">
                  <label>Education</label>
                  <input class="form-control" placeholder="Pendidikan" name="pendidikan">
                  {{ ($errors->has('pendidikan')) ? $errors->first('pendidikan') : '' }}
              </div>
              <div class="form-group">
                  <label>Departement</label>
                  <input class="form-control" placeholder="Jurusan" name="jurusan">
                  {{ ($errors->has('jurusan')) ? $errors->first('jurusan') : '' }}
              </div>
              <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" placeholder="Telepon" name="no_telp">
                  {{ ($errors->has('no_telp')) ? $errors->first('no_telp') : '' }}
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="Email" name="email">
                  {{ ($errors->has('email')) ? $errors->first('email') : '' }}
              </div>
              <button type="submit" name="name" value="post" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
