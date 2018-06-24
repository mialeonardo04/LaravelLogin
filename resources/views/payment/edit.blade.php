@extends('layouts.master')
@section('title', 'Edit Pembayaran')
@section('sidebar')
    @parent
@endsection

@section('content')
<h2 class="page-header">Bayar Tagihan Siswa</h2>
<div class="panel panel-default">
  <div class="panel-heading">
      Dinyatakan lunas jika notice = Rp.0,00| <a href="/payments" class="btn btn-danger btn-xs">Back</a>
  </div>
  <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <form role="form" action="/payments/{{$payment->NIS}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="put">
              <div class="form-group">
                  <label>NIS</label>
                  <input type="text" class="form-control" placeholder="Nomor Induk Siswa" readonly value="{{$payment->NIS}}" name="nis">
                  {{ ($errors->has('nis')) ? $errors->first('nis') : '' }}
              </div>
              <div class="form-group">
                  <label>Years</label>
                  <input type="text" class="form-control" placeholder="Tahun" name="tahun" readonly value="{{$payment->Tahun}}">
                  {{ ($errors->has('tahun')) ? $errors->first('tahun') : '' }}
              </div>
              <div class="form-group date" data-provide="datepicker-inline">
                  <label>Pay date</label>
                  <input type="date" class="form-control" placeholder="Tanggal Pembayaran" name="tgl_byr">
                  {{ ($errors->has('tgl_byr')) ? $errors->first('tgl_byr') : '' }}
              </div>
              <div class="form-group">
                  <label>Main Payment</label>
                  <input type="text" class="form-control" placeholder="(Isi 0 jika tidak membayar) SPP yang harus dibayar: Rp.{{$payment->SPP}},00" name="spp" >
                  {{ ($errors->has('spp')) ? $errors->first('spp') : '' }}
              </div>
              <div class="form-group">
                  <label>Activity Costs</label>
                  <input type="text" class="form-control" placeholder="(Isi 0 jika tidak membayar) Biaya Kegiatan yang harus dibayar: Rp.{{$payment->Uang_kegiatan}},00"  name="kegiatan">
                  {{ ($errors->has('kegiatan')) ? $errors->first('kegiatan') : '' }}
              </div>
              <div class="form-group">
                  <label>Book Payment</label>
                  <input type="text" class="form-control" placeholder="(Isi 0 jika tidak membayar) Uang Buku yang harus dibayar: Rp.{{$payment->Uang_buku}},00" name="buku">
                  {{ ($errors->has('buku')) ? $errors->first('buku') : '' }}
              </div>
              <div class="form-group">
                  <label>Catering</label>
                  <input type="text" class="form-control" placeholder="(Isi 0 jika tidak membayar) Katering yang harus dibayar: Rp.{{$payment->Katering}},00" name="katering">
                  {{ ($errors->has('katering')) ? $errors->first('katering') : '' }}
              </div>
              <div class="form-group">
                  <label>Comitee</label>
                  <input type="text" class="form-control" placeholder=" (Isi 0 jika tidak membayar)Komite yang harus dibayar: Rp.{{$payment->Komite}},00" name="komite">
                  {{ ($errors->has('komite')) ? $errors->first('komite') : '' }}
              </div>
              <div class="form-group">
                  <label>Uniform Costs</label>
                  <input type="text" class="form-control" placeholder="(Isi 0 jika tidak membayar) Uang Seragam yang harus dibayar: Rp.{{$payment->Seragam}},00" name="seragam">
                  {{ ($errors->has('seragam')) ? $errors->first('seragam') : '' }}
              </div>
              <div class="form-group">
                  <label>Others</label>
                  <input type="text" class="form-control" placeholder="(Isi 0 jika tidak membayar) Biaya Lain-lain  yang harus dibayar: Rp.{{$payment->Others}},00" name="lainnya">
                  {{ ($errors->has('lainnya')) ? $errors->first('lainnya') : '' }}
              </div>
              <button type="submit" name="name" value="edit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
