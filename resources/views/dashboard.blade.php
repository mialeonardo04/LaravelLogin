@extends('layouts.master')
@section('title', 'Home')
@section('sidebar')
    @parent
@endsection

@section('content')
    @if(Session::has('messageFromAdmin'))
        <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageFromAdmin') }}</div>
    @endif
    <div class="page-heading">
        <h1>Welcome</h1>
    </div>
    <div class="panel-body">
        <div class="col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Jumlah Siswa yang Terdaftar
                </div>
                <div class="panel-body">
                    <h2>{{$studentCount}} orang</h2>
                </div>
                <div class="panel-footer">
                    <a href="/students">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Jumlah User di Sistem
                </div>
                <div class="panel-body">
                    <h2>{{$userCount}} akun</h2>
                </div>
                <div class="panel-footer">
                    Lihat sebagai admin
                </div>
            </div>
        </div>

    </div>

@endsection

