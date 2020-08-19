@extends('admin.layouts.auth')

@section('content')
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="{{ url('images/admin-login.png') }}" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">Login</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">Welcome back, please login to your account.</p>

                                    <div class="card-content">
                                        <div class="pl-2 pr-2">
                                            @include('layouts.notice')
                                        </div>
                                        <div class="card-body pt-1">

                                            <form action="{{ route('admin.auth') }}" method="post">
                                                @csrf

                                                <fieldset class="form-label-group form-group position-relative has-icon-left @error('username') is-invalid @enderror">
                                                    <input type="text" class="form-control" id="user-name" placeholder="Username" required name="username" autocomplete="off" value="{{ old('username') }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">Username</label>
                                                </fieldset>




                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" class="form-control" id="user-password" placeholder="Password" required name="password">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">Password</label>
                                                </fieldset>
                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" name="checkbox">
                                                                <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                <span class="">Remember me</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="text-right"><a href="{{ route('admin.start.password_reset') }}" class="card-link">Forgot Password?</a></div>
                                                </div>
                                                {{--<a href="#" class="btn btn-outline-primary float-left btn-inline">Register</a>--}}
                                                <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                                <div class="mb-5"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection