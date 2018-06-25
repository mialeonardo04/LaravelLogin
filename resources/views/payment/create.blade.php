@extends('layouts.master')
@section('title', 'Input Pembayaran')
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
      Input data here| <a href="/payments" class="btn btn-danger btn-xs">Back</a>
  </div>
  <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <form role="form" action="/payments" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                  <label>NIS</label>
                  <select class="form-control" name="nis">
                      <option value="">Pilih Data Siswa</option>
                      @foreach($nis as $s)
                      <option value="{{ $s->NIS }}">{{ $s->NIS }} - {{ $s->Nama }}</option>
                      @endforeach
                  </select>
                  {{ ($errors->has('nis')) ? $errors->first('nis') : '' }}
              </div>
              <div class="form-group">
                  <label>Years</label>
                  <input class="form-control" placeholder="Tahun" name="tahun">
                  {{ ($errors->has('tahun')) ? $errors->first('tahun') : '' }}
              </div>
              <div class="form-group">
                  <label>Main Payment</label>
                  <input class="form-control" placeholder="SPP" name="spp">
                  {{ ($errors->has('spp')) ? $errors->first('spp') : '' }}
              </div>
              <div class="form-group">
                  <label>Activity Costs</label>
                  <input class="form-control" placeholder="Biaya Kegiatan" name="kegiatan">
                  {{ ($errors->has('kegiatan')) ? $errors->first('kegiatan') : '' }}
              </div>
              <div class="form-group">
                  <label>Book Payment</label>
                  <input class="form-control" placeholder="Uang Buku" name="buku">
                  {{ ($errors->has('buku')) ? $errors->first('buku') : '' }}
              </div>
              <div class="form-group">
                  <label>Catering</label>
                  <input class="form-control" placeholder="Katering" name="katering">
                  {{ ($errors->has('katering')) ? $errors->first('katering') : '' }}
              </div>
              <div class="form-group">
                  <label>Comitee</label>
                  <input class="form-control" placeholder="Komite" name="komite">
                  {{ ($errors->has('komite')) ? $errors->first('komite') : '' }}
              </div>
              <div class="form-group">
                  <label>Uniform Costs</label>
                  <input class="form-control" placeholder="Uang Seragam" name="seragam">
                  {{ ($errors->has('seragam')) ? $errors->first('seragam') : '' }}
              </div>
              <div class="form-group">
                  <label>Others</label>
                  <input class="form-control" placeholder="Lain-lain" name="lainnya">
                  {{ ($errors->has('lainnya')) ? $errors->first('lainnya') : '' }}
              </div>
              <button type="submit" name="name" value="post" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
