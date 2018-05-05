@extends('layouts.master')
@section('title', 'Detail Siswa')
@section('sidebar')
    @parent
@endsection

@section('content')
    @if(Session::has('messageFromAdmin'))
        <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageFromAdmin') }}</div>
    @endif
<h2 class="page-header">{{$student->Nama}}</h2>
<div class="panel panel-default">
  <div class="panel-heading">
      Detail | <a href="/students" class="btn btn-danger btn-xs">Back</a>
  </div>
  <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <form role="form" action="/students" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                  <label>NIS</label>
                  <input class="form-control" placeholder="Nomor Induk Siswa" value="{{$student->NIS}}" name="nis" disabled>
              </div>
              <div class="form-group">
                  <label>Place of birth</label>
                  <input class="form-control" placeholder="Tempat Lahir" value="{{$student->Tempat_lahir}}" name="tmp_lahir" disabled>
              </div>
              <div class="form-group">
                  <label>Date of birth</label>
                  <input class="form-control" placeholder="Tanggal Lahir" value="{{$student->Tanggal_lahir}}" name="tgl_lahir" disabled>
              </div>
              <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" placeholder="Alamat Tinggal" value="{{$student->Alamat}}" name="alamat" disabled>
              </div>
              <div class="form-group">
                  <label>Father's Name</label>
                  <input class="form-control" placeholder="Nama Ayah" value="{{$student->Nama_ayah}}" name="ayah" disabled>
              </div>
              <div class="form-group">
                  <label>Mother's Name</label>
                  <input class="form-control" placeholder="Nama Ibu" value="{{$student->Nama_ibu}}" name="ibu" disabled>
              </div>
              <div class="form-group">
                  <label>School</label>
                  <input class="form-control" placeholder="Sekolah Asal" value="{{$student->Asal_Sekolah}}" name="sekolah" disabled>
              </div>
              <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" placeholder="No. Telepon" value="{{$student->Telepon}}" name="no_telp" disabled>
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="Email" value="{{$student->email}}" name="email" disabled>
              </div>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
