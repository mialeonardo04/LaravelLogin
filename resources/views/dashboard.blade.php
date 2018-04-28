@extends('layouts.master')
@section('title', 'Home')
@section('sidebar')
    @parent
@endsection

@section('content')
    @if(Session::has('messageFromAdmin'))
        <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageFromAdmin') }}</div>
    @endif
<h1>Welcome to dashboard</h1>
@endsection

