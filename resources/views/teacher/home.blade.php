@extends('layouts.master')
@section('title', 'Data Guru')
@section('sidebar')
    @parent
@endsection

@section('content')
@if(Session::has('message'))
    <div class="alert {{ Session::get('alert alert-success', 'alert-info') }}">{{ Session::get('message') }}</div>
@elseif(Session::has('messageEdit'))
    <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageEdit') }}</div>
@endif
<h2 class="page-header">Daftar Pengajar</h2>

  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <a href="/teachers/create/">
          <button type="button" class="btn btn-primary btn-xs">Create New</button>
        </a> | 
          <a href="/dashboard">
            <button type="button" class="btn btn-danger btn-xs">Back to Home</button>
          </a>
      </div>

      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>

                  <tr>
                      <th>NIP</th>
                      <th>Nama Lengkap</th>
                      <th>Tempat,Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Pendidikan/Jurusan</th>
                      <th>No. Telepon</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($teachers as $t)
                  <tr>
                      <td>{{$t->NIP}}</td>
                      <td>{{$t->Nama}}</td>
                      <td>{{$t->Tempat_lahir}}, {{$t->Tanggal_lahir}}</td>
                      <td>{{$t->Alamat}}</td>
                      <td>{{$t->Pendidikan}}-{{$t->Jurusan}}</td>
                      <td>{{$t->Telepon}}</td>

                      <td><a href="/teachers/{{$t->slug}}"><i class="fa fa-eye"></i></a> | <a href="/teachers/{{$t->NIP}}/edit"><i class="fa fa-pencil-square-o"></i></a> |
                      <form style="display: inline;" action="/teachers/{{$t->NIP}}" method="post">
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
    {!! $teachers->links() !!}
      </div>
      <!-- /.panel -->
    </div>
@endsection
