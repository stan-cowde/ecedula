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
                                                    <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#termsModal" data-bs-toggle="modal" data-bs-target="#termsModal">terms and conditions</a></label>

                                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                                </div>
                                            </div>

                                            <hr class="mb-3">

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

    <!-- Terms and Conditions Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                    <div class="terms-content">
                        <h6>1. Acceptance of Terms</h6>
                        <p>By accessing and using the eCedula Community Tax Certificate system, you accept and agree to be bound by the terms and provision of this agreement.</p>

                        <h6>2. Use License</h6>
                        <p>Permission is granted to temporarily download one copy of the materials on eCedula's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                        <ul>
                            <li>modify or copy the materials</li>
                            <li>use the materials for any commercial purpose or for any public display (commercial or non-commercial)</li>
                            <li>attempt to decompile or reverse engineer any software contained on the website</li>
                            <li>remove any copyright or other proprietary notations from the materials</li>
                        </ul>

                        <h6>3. Disclaimer</h6>
                        <p>The materials on eCedula's website are provided on an 'as is' basis. eCedula makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>

                        <h6>4. Limitations</h6>
                        <p>In no event shall eCedula or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on eCedula's website, even if eCedula or a eCedula authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</p>

                        <h6>5. Privacy Policy</h6>
                        <p>Your privacy is important to us. Our Privacy Policy explains how we collect, use, and protect your information when you use our service.</p>

                        <h6>6. User Data</h6>
                        <p>When using our Community Tax Certificate system, you agree to provide accurate and complete information. You are responsible for maintaining the confidentiality of your account and password.</p>

                        <h6>7. Prohibited Uses</h6>
                        <p>You may not use our service:</p>
                        <ul>
                            <li>For any unlawful purpose or to solicit others to perform unlawful acts</li>
                            <li>To violate any international, federal, provincial, or state regulations, rules, laws, or local ordinances</li>
                            <li>To infringe upon or violate our intellectual property rights or the intellectual property rights of others</li>
                            <li>To harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate</li>
                            <li>To submit false or misleading information</li>
                        </ul>

                        <h6>8. Termination</h6>
                        <p>We may terminate or suspend your account and bar access to the service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever and without limitation, including but not limited to a breach of the Terms.</p>

                        <h6>9. Changes to Terms</h6>
                        <p>eCedula reserves the right to revise these terms of service at any time without notice. By using this website, you are agreeing to be bound by the then current version of these terms of service.</p>

                        <h6>10. Contact Information</h6>
                        <p>If you have any questions about these Terms and Conditions, please contact us through our official channels.</p>

                        <p><strong>Last updated:</strong> {{ date('F d, Y') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="acceptTermsBtn">Accept Terms</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <!-- Vendor JS Files -->
    <!---->







    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle Accept Terms button
            document.getElementById('acceptTermsBtn').addEventListener('click', function() {
                // Check the terms checkbox
                document.getElementById('acceptTerms').checked = true;

                // Close the modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('termsModal'));
                modal.hide();
            });

            // Prevent form submission if terms are not accepted
            document.querySelector('form').addEventListener('submit', function(e) {
                const termsCheckbox = document.getElementById('acceptTerms');
                if (!termsCheckbox.checked) {
                    e.preventDefault();
                    termsCheckbox.focus();
                }
            });
        });
    </script>
@endsection
