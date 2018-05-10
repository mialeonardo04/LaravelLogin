@extends('layouts.master')
@section('title', 'Edit Pembayaran')
@section('sidebar')
    @parent
@endsection

@section('content')
<h2 class="page-header">Edit data</h2>
<div class="panel panel-default">
  <div class="panel-heading">
      Update data here| <a href="/payments" class="btn btn-danger btn-xs">Back</a>
  </div>
  <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <form role="form" action="/payments/{{$payment->NIS}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="put">
              <div class="form-group">
                  <label>NIS</label>
                  <input class="form-control" placeholder="Nomor Induk Siswa" value="{{$payment->NIS}}" name="nis">
                  {{ ($errors->has('nis')) ? $errors->first('nis') : '' }}
              </div>
              <div class="form-group">
                  <label>Years</label>
                  <input class="form-control" placeholder="Tahun" name="tahun" value="{{$payment->Tahun}}">
                  {{ ($errors->has('tahun')) ? $errors->first('tahun') : '' }}
              </div>
              <div class="form-group">
                  <label>Pay date</label>
                  <input class="form-control" placeholder="Tanggal Pembayaran" value="{{$payment->Tanggal_bayar}}" name="tgl_byr">
                  {{ ($errors->has('tgl_byr')) ? $errors->first('tgl_byr') : '' }}
              </div>
              <div class="form-group">
                  <label>Main Payment</label>
                  <input class="form-control" placeholder="SPP" name="spp" value="{{$payment->SPP}}">
                  {{ ($errors->has('spp')) ? $errors->first('spp') : '' }}
              </div>
              <div class="form-group">
                  <label>Activity Costs</label>
                  <input class="form-control" placeholder="Biaya Kegiatan" value="{{$payment->Uang_kegiatan}}" name="kegiatan">
                  {{ ($errors->has('kegiatan')) ? $errors->first('kegiatan') : '' }}
              </div>
              <div class="form-group">
                  <label>Book Payment</label>
                  <input class="form-control" placeholder="Uang Buku" value="{{$payment->Uang_buku}}" name="buku">
                  {{ ($errors->has('buku')) ? $errors->first('buku') : '' }}
              </div>
              <div class="form-group">
                  <label>Catering</label>
                  <input class="form-control" placeholder="Katering" value="{{$payment->Katering}}" name="katering">
                  {{ ($errors->has('katering')) ? $errors->first('katering') : '' }}
              </div>
              <div class="form-group">
                  <label>Comitee</label>
                  <input class="form-control" placeholder="Komite" value="{{$payment->Komite}}" name="komite">
                  {{ ($errors->has('komite')) ? $errors->first('komite') : '' }}
              </div>
              <div class="form-group">
                  <label>Uniform Costs</label>
                  <input class="form-control" placeholder="Uang Seragam" value="{{$payment->Seragam}}" name="seragam">
                  {{ ($errors->has('seragam')) ? $errors->first('seragam') : '' }}
              </div>
              <div class="form-group">
                  <label>Others</label>
                  <input class="form-control" placeholder="Lain-lain" value="{{$payment->Others}}" name="lainnya">
                  {{ ($errors->has('lainnya')) ? $errors->first('lainnya') : '' }}
              </div>
              <button type="submit" name="name" value="edit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
