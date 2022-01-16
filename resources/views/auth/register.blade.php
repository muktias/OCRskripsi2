@extends('layouts.footer')
@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <div>
            <div align="center" class="containerlogin">
                <div class="title">REGISTER</div>
                <div>
                    <table class="tabel-register">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <tr>
                                <td>
                                    <input id="user_name" type="text" placeholder="Nama" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('user_name') }}" required autofocus>

                                    @if ($errors->has('user_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_name') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="password-confirm" type="password" placeholder="Confirm password" class="form-control" name="password_confirmation" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </td>
                            </tr>
                            <tr>
                            <td>
                                <h1 class="h1"> OR </h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/auth/google" class="button" style="background-color: #ef5a42">
                                   <!--  <img src="{{asset('logo-google.png')}}" alt="google" height="15" widht="15"> -->Login with Google</a>                            
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/auth/facebook" class="button" style="background-color: #4b69A8"> 
                                    <!-- <img src="{{asset('images/logo-facebook.png')}}" alt="facebook" height="15" widht="15"> --> Login with Facebook</a>
                            </td>
                        </tr>  
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
