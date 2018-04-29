@extends('layouts.master')
@section('title', 'Admin')
@section('sidebar')
    @parent
@endsection

@section('content')
    <h2 class="page-header">User List</h2>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
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
                            <th>Nama Akun</th>
                            <th>Email</th>
                            <th>Super User</th>
                            <th>Normal User</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <form action="{{ route('admin.assign') }}" method="post">
                                    @if( Auth::user()->name == $user->name)
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                        <td><input type="checkbox" {{ $user->hasRole('admin') ? 'checked' : '' }} name="role_admin" disabled></td>
                                        <td><input type="checkbox" {{ $user->hasRole('user') ? 'checked' : '' }} name="role_user" disabled></td>
                                        {{ csrf_field() }}
                                        <td><button type="submit" class="btn btn-success btn-xs" disabled>Change Roles</button></td>

                                    @else
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                        <td><input type="checkbox" {{ $user->hasRole('admin') ? 'checked' : '' }} name="role_admin"></td>
                                        <td><input type="checkbox" {{ $user->hasRole('user') ? 'checked' : '' }} name="role_user"></td>
                                        {{ csrf_field() }}
                                        <td><button type="submit" class="btn btn-success btn-xs">Change Roles</button></td>
                                    @endif
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="alert alert-danger">** please uncheck before check the new role</p>
            </div>
        </div>
    </div>
@endsection