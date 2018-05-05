@extends('layouts.master')
@section('title', 'Edit Data Siswa')
@section('sidebar')
    @parent
@endsection

@section('content')
@if(Session::has('message'))
    <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('message') }}</div>
@endif
@if(Session::has('messageFromAdmin'))
    <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageFromAdmin') }}</div>
@endif
<h2 class="page-header">Edit data</h2>
<div class="panel panel-default">
  <div class="panel-heading">
      Update data here| <a href="/students" class="btn btn-danger btn-xs">Back</a>
  </div>
  <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <form role="form" action="/students/{{$student->NIS}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="put">
              <div class="form-group">
                  <label>NIS</label>
                  <input class="form-control" placeholder="Nomor Induk Siswa" value="{{$student->NIS}}" name="nis">
                  {{ ($errors->has('nis')) ? $errors->first('nis') : '' }}
              </div>
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" placeholder="Nama Lengkap" value="{{$student->Nama}}" name="nama">
                  {{ ($errors->has('nama')) ? $errors->first('nama') : '' }}
              </div>
              <div class="form-group">
                  <label>Place of birth</label>
                  <input class="form-control" placeholder="Tempat Lahir" value="{{$student->Tempat_lahir}}" name="tmp_lahir">
                  {{ ($errors->has('tmp_lahir')) ? $errors->first('tmp_lahir') : '' }}
              </div>
              <div class="form-group">
                  <label>Date of birth</label>
                  <input class="form-control" placeholder="Tanggal Lahir" value="{{$student->Tanggal_lahir}}" name="tgl_lahir">
                  {{ ($errors->has('tgl_lahir')) ? $errors->first('tgl_lahir') : '' }}
              </div>
              <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" placeholder="Alamat Tinggal" value="{{$student->Alamat}}" name="alamat">
                  {{ ($errors->has('alamat')) ? $errors->first('alamat') : '' }}
              </div>
              <div class="form-group">
                  <label>Father's Name</label>
                  <input class="form-control" placeholder="Nama Ayah" value="{{$student->Nama_ayah}}" name="ayah">
                  {{ ($errors->has('ayah')) ? $errors->first('ayah') : '' }}
              </div>
              <div class="form-group">
                  <label>Mother's Name</label>
                  <input class="form-control" placeholder="Nama Ibu" value="{{$student->Nama_ibu}}" name="ibu">
                  {{ ($errors->has('ibu')) ? $errors->first('ibu') : '' }}
              </div>
              <div class="form-group">
                  <label>School</label>
                  <input class="form-control" placeholder="Sekolah Asal" value="{{$student->Asal_Sekolah}}" name="sekolah">
                  {{ ($errors->has('sekolah')) ? $errors->first('sekolah') : '' }}
              </div>
              <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" placeholder="No. Telepon" value="{{$student->Telepon}}" name="no_telp">
                  {{ ($errors->has('no_telp')) ? $errors->first('no_telp') : '' }}
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="Email" value="{{$student->email}}" name="email">
                  {{ ($errors->has('email')) ? $errors->first('email') : '' }}
              </div>
              <button type="submit" name="name" value="edit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
