@extends('layouts.master')
@section('title', 'Data Pembayaran')
@section('sidebar')
    @parent
@endsection

@section('content')
@if(Session::has('message'))
    <div class="alert {{ Session::get('alert alert-success', 'alert-info') }}">{{ Session::get('message') }}</div>
@elseif(Session::has('messageEdit'))
    <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageEdit') }}</div>
@endif
<h2 class="page-header">Data Pembayaran</h2>

    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="/payments/create/">
            <button type="button" class="btn btn-primary btn-xs">Create New</button>
          </a> | 
          <a href="/dashboard">
            <button type="button" class="btn btn-danger btn-xs">Back to Home</button>
          </a>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                  <thead>

                    <tr>
                        <th>NIS</th>
                        <th>Tahun(Kelas)</th>
                        <th>TanggalBayar</th>
                        <th>SPP</th>
                        <th>Kegiatan</th>
                        <th>Uang Buku</th>
                        <th>Katering</th>
                        <th>Komite</th>
                        <th>Seragam</th>
                        <th>Lain-lain</th>
                        <th colspan="3" style="text-align:center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($payments as $p)
                    <tr>
                        <td>{{$p->NIS}}</td>
                        <td>{{$p->Tahun}}</td>
                        <td>{{$p->Tanggal_bayar}}</td>
                        <td>Rp.{{number_format($p->SPP,2,',','.')}}</td>
                        <td>Rp.{{number_format($p->Uang_kegiatan,2,',','.')}}</td>
                        <td>Rp.{{number_format($p->Uang_buku,2,',','.')}}</td>
                        <td>Rp.{{number_format($p->Katering,2,',','.')}}</td>
                        <td>Rp.{{number_format($p->Komite,2,',','.')}}</td>
                        <td>Rp.{{number_format($p->Seragam,2,',','.')}}</td>
                        <td>Rp.{{number_format($p->Others,2,',','.')}}</td>

                        <td><form><a href="/payments/{{$p->NIS}}"><i class="fa fa-eye"></i>Preview</a></form></td>
                        <td><form><a href="/payments/{{$p->NIS}}/edit"><i class="fa fa-pencil-square-o"></i>Edit</a></form></td>
                        <td><form action="/payments/{{$p->NIS}}" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="_method" value="delete">
                          <button type="submit" class="btn-link" onclick="return confirm('Delete item! Are you sure?')"><i class="fa fa-trash-o"></i>Delete</button>
                        </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
      {!! $payments->links() !!}
        </div>
        <!-- /.panel -->
      </div>
@endsection
