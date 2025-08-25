@extends('layouts.app')

@section('main')

    <main id="maintwo" class="maintwo">
        <div class="container">
            <header>Community Tax Certificate</header>

            @livewire('user.verification.fourth-step')
        </div>

    </main>
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
    <!-- Vendor JS Files -->
    <!---->







    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection


