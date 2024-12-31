@extends('layouts.guest')

@section('main')

    <main>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="container">

                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                                <div class="d-flex justify-content-center py-4">
                                    <a href="{{ route('login') }}" class="logo d-flex align-items-center w-auto">
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
                                            <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                            <p class="text-center small">Enter your personal details to create account</p>
                                        </div>

                                        <form class="row g-3 needs-validation" novalidate>
                                            <div class="col-12">
                                                <label for="yourName" class="form-label">First Name</label>
                                                <input type="text" name="firstname" class="form-control" id="firstname" required>
                                                <div class="invalid-feedback">Please, enter your First Name!</div> <!--himoong LAst Name-->
                                            </div>

                                            <div class="col-12">
                                                <label for="yourName" class="form-label">Last Name</label>
                                                <input type="text" name="lastname" class="form-control" id="lastname" required>
                                                <div class="invalid-feedback">Please, enter your Last Name!</div> <!--himoong LAst Name-->
                                            </div>

                                            <div class="col-12">
                                                <label for="yourEmail" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" required>
                                                <div class="invalid-feedback">Please enter a valid Email adddress!</div> <!--himoong First Name-->
                                            </div>

                                            <div class="col-12">
                                                <label for="yourUsername" class="form-label">Username</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="text" name="username" class="form-control" id="username" required>
                                                    <div class="invalid-feedback">Please choose a username.</div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Confirm Password</label>
                                                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <hr class="mb-3">

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                                    <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>

                                                    <hr class="mb-2">

                                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit" id="register" name="create">Create Account</button>
                                            </div>

                                            <div class="col-12">
                                                <p class="small mb-0 mt-3">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                                            </div>
                                        </form>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </form>
    </main>
@endsection



@section('js')
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection


