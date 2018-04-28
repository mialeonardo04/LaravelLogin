@extends('layouts.masterlogin')
@section('title', 'Login')
@section('judulpanel','Sign In')
@section('content')
    @if(Session::has('messageLogin'))
        <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageLogin') }}</div>
    @endif
    <form role="form" method="POST" action="{{ route('login') }}">
        @csrf
        <fieldset>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''  }}">
                <input id="email" type="email" placeholder="email address" class="form-control" name="email"  value="{{Request::old('email')}}" autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}">
              <input id="password" type="password" placeholder="password" class="form-control" name="password"  value="{{Request::old('password')}}">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                                    @endif
            </div>
            <div class="checkbox">
                <label>
                    Do not have an account yet? <a href="/register">Register now</a> or <a href="/">Back</a> to our web page
                </label>
            </div>
            <button type="submit" class="btn btn-lg btn-success btn-block btn-primary">
                Login
            </button>

        </fieldset>
    </form>
@endsection
