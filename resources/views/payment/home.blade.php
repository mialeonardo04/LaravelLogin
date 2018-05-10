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
          <a href="/">
            <button type="button" class="btn btn-danger btn-xs">Back to Home</button>
          </a>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-hover">
                  <thead>

                    <tr>
                        <th>NIS</th>
                        <th>Tanggal pembayaran</th>
                        <th>SPP</th>
                        <th>Uang Kegiatan</th>
                        <th>Uang Buku</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($payments as $p)
                    <tr>
                        <td>{{$p->NIS}}</td>
                        <td>{{$p->Tanggal_bayar}}</td>
                        <td>@money($p->SPP)</td>
                        <td>@money($p->Uang_kegiatan)</td>
                        <td>@money($p->Uang_buku)</td>

                        <td><a href="/payments/{{$p->NIS}}"><i class="fa fa-eye"></i></a> | <a href="/payments/{{$p->NIS}}/edit"><i class="fa fa-pencil-square-o"></i></a> |
                        <form style="display: inline;" action="/payments/{{$p->NIS}}" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="_method" value="delete">
                          <button type="submit" class="btn-link" onclick="return confirm('Delete item! Are you sure?')"><i class="fa fa-trash-o"></i></button>
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
