@extends('layouts.app')

@section('main')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>

                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">



                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ asset('assets/img/prof-icon.png') }}" alt="Profile" class="rounded-circle">
                            <h2>{{ \Auth::user()->username }}</h2>
                            <h3></h3>
                            <div class="social-links mt-2">
                                <h4>Email: {{ ucwords(\Auth::user()->email) }}</h4>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title"></h5>
                                    <p class="small fst-italic"> </p>

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Name</div>
                                        <div class="col-lg-9 col-md-8">{{ \Auth::user()->firstname . ' ' . \Auth::user()->lastname}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Country</div>
                                        <div class="col-lg-9 col-md-8">Philippines</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Citizenship</div>
                                        <div class="col-lg-9 col-md-8">Filipino</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ \Auth::user()->email }}</div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit -->
                                    @livewire('user.profile-edit')


                                </div>


                                <div class="tab-pane fade pt-3" id="profile-change-password">

                                    <!-- Change Password Form -->
                                    @livewire('user.profile-change-password')

                                </div>

                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection


@section('footer')
    <footer id="footer" class="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">

                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="{{ asset('assets/img/logo2.png') }}" alt="">
                            <span>eCedula</span>
                        </a>
                        <p>Get in touch with us!</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                            <!--    <li><i class="bi bi-chevron-right"></i> <a href="#"></a></li>  -->
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>



                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contact Us</h4>
                        <p>

                            <strong>Phone:</strong> +63 9880088088<br>
                            <strong>Email:</strong> umdc@email.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; <strong><span></span></strong>All Rights Reserved 2023
            </div>
            <div class="credits">

            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection


@section('js')

    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Vendor JS Files -->





    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection


