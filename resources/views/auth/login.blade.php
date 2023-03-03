@extends('layouts.auth')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- login page start -->
            <section id="auth-login" class="row flexbox-container">
                <div class="col-xl-4 col-11">
                    <div class="card mb-0">
                        <div class="row m-0">
                            <!-- left section-login -->
                            <div class=" col-12 px-0">
                                <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="text-center mb-2">Welcome To MetaDent</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('auth.login') }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-50">
                                                <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')  <div class="text-danger">{{ $message }}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="text-bold-600" for="exampleInputPassword1">Password</label>
{{--                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                                <div class="text-left">
                                                    <div class="checkbox checkbox-sm">
                                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="checkboxsmall" for="exampleCheck1"><small>Keep me logged
                                                                in</small></label>
                                                    </div>
                                                </div>
                                                <div class="text-right">

                                                    @if (Route::has('password.request'))
                                                        <a class="card-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                   </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                        </form>
{{--                                        <hr>--}}
{{--                                        <div class="text-center"><small class="mr-25">Don't have an account?</small><a href="auth-register.html"><small>Sign up</small></a></div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- login page ends -->

        </div>
    </div>
</div>
@endsection
