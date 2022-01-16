@extends('layouts.footer')
@extends('layouts.app')

@section('content')
<div class="center container">
       
            <div align="center" class="containerlogin">
                <div class="title"> LOGIN </div>
                <table class="tabel-register">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf                
                        <tr align="center">
                                <td>
                                    <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </td>
                        </tr>
                        <tr align="center">
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
                            <td >
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label style="font-size: 13px" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <button type="submit">
                                    Login
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @if (Route::has('password.request'))
                                    <a style="font-size: 13px" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
@endsection


























