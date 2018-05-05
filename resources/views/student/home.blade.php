@extends('layouts.master')
@section('title', 'Data Siswa')
@section('sidebar')
    @parent
@endsection

@section('content')
    @if(Session::has('messageFromAdmin'))
        <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageFromAdmin') }}</div>
    @endif
    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert alert-success', 'alert-info') }}">{{ Session::get('message') }}</div>
    @elseif(Session::has('messageEdit'))
        <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageEdit') }}</div>
    @endif
    <h2 class="page-header">Daftar Siswa</h2>
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="/students/create/">
            <button type="button" class="btn btn-primary btn-xs">Create New</button>
          </a> |
          <a href="/dashboard">
             <button type="button" class="btn btn-danger btn-xs">Back to Home</button>
          </a> |
          <a href="/printallstudent">
              <button type="button" class="btn btn-link btn-xs">Print theese data into PDF</button>
          </a>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
                      <table class="table table-hover">
                          <thead>
                          <tr class="text-black">
                              <th>NIS</th>
                              <th>Nama Lengkap</th>
                              <th>Tempat,Tanggal Lahir</th>
                              <th>Alamat</th>
                              <th>Asal Sekolah</th>
                              <th>No. Telepon</th>
                              <th><center>Action</center></th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($students as $s)
                              <tr>
                                  <td>{{$s->NIS}}</td>
                                  <td>{{$s->Nama}}</td>
                                  <td>{{$s->Tempat_lahir}}, {{$s->Tanggal_lahir}}</td>
                                  <td>{{$s->Alamat}}</td>
                                  <td>{{$s->Asal_Sekolah}}</td>
                                  <td>{{$s->Telepon}}</td>

                                  <td><a href="/students/{{$s->slug}}"><i class="fa fa-eye"></i></a> | <a href="/students/{{$s->NIS}}/edit"><i class="fa fa-pencil-square-o"></i></a> |
                                      <form style="display: inline;" action="/students/{{$s->NIS}}" method="post">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <input type="hidden" name="_method" value="delete">
                                          <button type="submit" class="btn-link" onclick="return confirm('Delete item! Are you sure?')"><i class="fa fa-trash-o"></i></button>
                                      </form>
                                      | <a href="/students/printbyid/{{$s->slug}}"><span class="glyphicon glyphicon-print"></span> print</a>
                                  </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
              </div>
            <!-- /.table-responsive -->
          </div>
        {!! $students->links() !!}
        </div>
        <!-- /.panel -->
      </div>
@endsection
