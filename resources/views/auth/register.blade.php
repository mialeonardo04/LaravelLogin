@extends('layouts.masterlogin')
@section('title', 'Sign Up')
@section('judulpanel','Sign Up')
@section('content')
    <form role="form" method="POST" action="{{ route('register') }}">
        <fieldset>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''  }}">
                <input id="email" placeholder="email address" type="text" class="form-control" name="email" value="{{Request::old('email')}}" autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
                <input id="name" placeholder="Your Full/Nick Name" type="text" class="form-control" name="name"  value="{{Request::old('name')}}">
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}">
                <input id="password" type="password" placeholder="password" class="form-control" name="password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <select class="form-control" id="sel1" name="role" placeholder="role (1 for admin, 2 for user)">
                    <option value="1">admin</option>
                    <option value="2">user</option>
                </select>
            </div>

            <div class="checkbox">
                <label>
                    Already have an account?<a href="/login">Login now</a>
                </label>
            </div>
            <button type="submit" class="btn btn-lg btn-success btn-block btn-primary">
                Submit
            </button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </fieldset>
    </form>
@endsection
