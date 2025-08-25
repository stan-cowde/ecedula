@extends('layouts.guest')

@section('main')

    <main>
        @if(session('message') === true)
            <div class="toast-container top-0 end-0 p-3">
                <div id="welcomeToast" data-example-toggle="toast" class="toast text-bg-success" role="alert">
                    <div class="toast-body">
                        <div class="d-flex">
                            <span><i class="fa-solid fa-circle-check fa-lg"></i></span>
                            <div class="d-flex flex-grow-1 align-items-center justify-content-center">
                                <span class="fw-semibold">Account Created</span>
                                🎉
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('assets/img/E.png') }}" alt="">
                                    <span class="d-none d-lg-block">eCedula</span>
                                </a>
                            </div>
                            <div class="tagline">
                                <p>Community Tax Certificate.</p>
                            </div>
                            <!-- End Logo -->

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>

                                    <form action="{{ route('authenticate') }}" method="post" class="row g-3 needs-validation" novalidate>
                                        @csrf

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>

                                                <input type="text" value="{{ old('username') }}" name="username" autocomplete="username" autofocus class="form-control" id="yourUsername" required>

                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                 @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>


                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>

                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="{{ route('show.register') }}">Create an account</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->
@endsection


@section('js')
    <!-- Vendor JS Files -->
    <!---->







    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection


