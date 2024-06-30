<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="mobile-web-app-capable" content="yes" />
    <!-- Developer information -->
    <meta name="Copyright" content="© 2023 City Government of Digos, Philippines" /><meta name="Publisher" content="City Government of Davao" /><meta name="Author" content="CTO" /><meta name="Designer" content="CITC" /><meta name="subject" content="Government" /><meta name="Language" content="English" /><meta name="distribution" content="Local" /><meta name="country" content="Philippines" />
    <!-- Favicons -->
    <link href="../Content/images/icon.png" rel="shortcut icon" type="image/png" /><link href="../Content/images/icon.png" rel="image_src" type="image/png" />
    <!-- Stylesheets -->
    <link href="../Content/bootstrap/css/bootstrap.min.css" rel="stylesheet" /><link href="../Content/style.common.css?v=4" rel="stylesheet" />




        <title>eCedula</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/E.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <link href="assets/css/application_form.css" rel="stylesheet">

    </head>

    <body>

       <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="landing-page.html" class="logo d-flex align-items-center">
                <img src="assets/img/E.png" alt="">
                <span>eCedula</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                <li><a class="nav-link scrollto active" href="#hero"></a></li>
                <li><a class="nav-link scrollto" href="#about"></a></li>

                <!--  <li><a class="nav-link scrollto" href="#services">Services</a></li> --> 
          
                <li><a class="nav-link scrollto" href="#team"></a></li>
       
                <li><a class="nav-link scrollto" href="#contact"></a></li>
                <li><a class="getstarted scrollto" href="pages-login.html">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        <section>
        <div class="container-fluid bg-blue py-4">
            <div class="container" style="display: flex; justify-content: left; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
                <img src="../Content/images/davao.png" class="logo" />
                <img src="../Content/images/lifeishere.png" class="banner" />
                <h2 class="text-shadow text-white text-bold">COMMUNITY TAX CERTIFICATE</h2>
            </div>
        </div>
        <div class="container py-4">
            <div class="form-group">
                <div style="color: #ff0000c9; font-size: medium;" class="col-sm-6 mt-1 text-bold">
                    <span>*Please take note of your REFERENCE NUMBER after registration</span>
                </div>
                <div class="col-sm-3 mt-1">
                    <span>Place of Issue</span><br />
                    <input name="ctl00$SectionBody$ind_pIssued" type="text" value="DIGOS CITY" id="SectionBody_ind_pIssued" class="form-control input-md" />
                </div>
                <div class="col-sm-3 mt-1">
                    <span>Date Issued</span><br />
                    <input name="ctl00$SectionBody$ind_dIssued" type="text" value="03-11-2024" id="SectionBody_ind_dIssued" class="form-control input-md" />
                </div>
            </div>
        </div>
        <section class="panel">
            <div class="text-center">
                <h3>PERSONAL INFORMATION</h3>
            </div>
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-4 mt-2">
                        <span>Last Name</span>
                        <input name="ctl00$SectionBody$lastname" type="text" id="SectionBody_lastname" class="form-control input-md text-capitalize" placeholder="Last Name" required="true" />
                    </div>
                    <div class="col-sm-4 mt-2">
                        <span>First Name</span>
                        <input name="ctl00$SectionBody$firstname" type="text" id="SectionBody_firstname" class="form-control input-md text-capitalize" placeholder="First Name" required="true" />
                    </div>
                    <div class="col-sm-4 mt-2">
                        <span>Middle Name</span>
                        <input name="ctl00$SectionBody$middlename" type="text" id="SectionBody_middlename" class="form-control input-md text-capitalize" placeholder="Middle Name" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-8 mt-2">
                        <span>Address</span><br />
                        <input name="ctl00$SectionBody$ind_address" type="text" id="SectionBody_ind_address" class="form-control input-md text-capitalize" placeholder="Address" required="true" />
                    </div>
                    <div class="col-sm-4 mt-2">
                        <span>Barangay</span><br />
                        <select name="ctl00$SectionBody$ind_brgy" id="SectionBody_ind_brgy" class="form-control input-md" required="true">
	<option selected="selected" value="">Select Barangay ---</option>
	<option value="182">APLAYA</option>
	<option value="183">BALABAG</option>
	<option value="184">BINATON</option>
	<option value="185">COGON</option>
	<option value="186">COLORADO</option>
	<option value="187">DAWIS</option>
	<option value="188">DULANGAN</option>
	<option value="189">GOMA</option>
	<option value="190">IGPIT</option>
	<option value="191">KAPATAGAN</option>
	<option value="192">KIAGOT</option>
	<option value="193">LUNGAG</option>
	<option value="194">MAHAYAHAY</option>
	<option value="195">MATTI</option>
	<option value="196">RUPARAN</option>
	<option value="197">SAN AUGUSTIN</option>
	<option value="198">SAN JOSE</option>
	<option value="199">SAN MIGUEL</option>
	<option value="200">SAN ROQUE</option>
	<option value="201">SINAWILAN</option>
	<option value="202">SOONG</option>
	<option value="203">TIGUMAN</option>
	<option value="204">TRES DE MAYO</option>
	<option value="205">ZONE 1</option>
	<option value="206">ZONE 2</option>
	<option value="206">ZONE 3</option>
	

</select>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-2 mt-2">
                        <span>Gender</span><br />
                        <select name="ctl00$SectionBody$gender" id="SectionBody_gender" class="form-control input-md" required="required">
	<option selected="selected" value="" hidden="">Select ---</option>
	<option value="MALE">MALE</option>
	<option value="FEMALE">FEMALE</option>
</select>
                    </div>
                    <div class="col-sm-2 mt-2">
                        <span>Citizenship</span><br />
                        <select name="ctl00$SectionBody$citizenship" id="SectionBody_citizenship" class="form-control input-md" required="required">
	<option selected="selected" value="" hidden="">Select ---</option>
	<option value="FILIPINO">FILIPINO</option>
	<option value="OTHER">OTHER</option>
</select>
                    </div>
                    <div class="col-sm-4 mt-2">
                        <span>Place of Birth</span><br />
                        <input name="ctl00$SectionBody$pbirth" type="text" id="SectionBody_pbirth" class="form-control input-md text-capitalize" placeholder="Place of Birth" required="true" />
                    </div>
                    <div class="col-sm-4 mt-2">
                        <span>Date of Birth</span><br />
                        <input name="ctl00$SectionBody$datebirth" type="date" id="SectionBody_datebirth" class="form-control" required="true" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-2 mt-2">
                        <span>Height (cm)</span>
                        <input name="ctl00$SectionBody$height" type="text" id="SectionBody_height" class="form-control input-md" required="true" />
                    </div>
                    <div class="col-sm-2 mt-2">
                        <span>Weight (kg)</span>
                        <input name="ctl00$SectionBody$weight" type="text" id="SectionBody_weight" class="form-control input-md" required="true" />
                    </div>
                    <div class="col-sm-4 mt-2">
                        <span>Civil Status</span><br />
                        <select name="ctl00$SectionBody$status" id="SectionBody_status" class="form-control input-md" required="required">
	<option selected="selected" value="" hidden="">Select Civil Status ---</option>
	<option value="SINGLE">SINGLE</option>
	<option value="MARRIED">MARRIED</option>
	<option value="WIDOWED/LEGALLY SEPARATED">WIDOWED/LEGALLY SEPARATED</option>
	<option value="DIVORCED">DIVORCED</option>
</select>
                    </div>
                    <div class="col-sm-2 mt-2">
                        <span>ICR No (if Alien)</span>
                        <input name="ctl00$SectionBody$icr" type="text" id="SectionBody_icr" class="form-control input-md" />
                    </div>
                    <div class="col-sm-2 mt-2">
                        <span>TIN (if Any)</span>
                        <input name="ctl00$SectionBody$tin" type="text" id="SectionBody_tin" class="form-control input-md" />
                    </div>

                </div>
            </div>
            <div class="container" style="padding-bottom: 2rem">
                <div class="form-group">
                    <div class="col-sm-12 mt-2">
                        <span>Profession/Occupation/Business</span><br />
                        <input name="ctl00$SectionBody$proocbu" type="text" id="SectionBody_proocbu" class="form-control input-md text-capitalize" placeholder="Profession/Occupation/Business" required="true" />
                    </div>
                </div>
            </div>
        </section>
        <section class="panel">
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-6 mt-2">
                        <span class="text-bold">BASIC COMMUNITY TAX</span><br />
                        <span>(₱5.00) Voluntary or Exempted (₱1.00)</span>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3 mt-2">
                        <span>CTC Amount</span>
                        <input name="ctl00$SectionBody$ind_bctctcamount" type="text" id="SectionBody_ind_bctctcamount" class="number form-control input-md text-right" value="5.00" readonly="true" />
                    </div>
                </div>
            </div>
            <hr />
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-6 mt-2">
                        <span>GROSS RECEIPT OR EARNINGS DERIVED FROM BUSINESS DURING THE PRECEDING YEAR</span><br />
                        <span>(₱1.00 for every ₱1,000.00)</span>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <span>Annual Gross Income</span>
                        <div class="absolute-peso">
                            <input name="ctl00$SectionBody$bsns" type="text" id="SectionBody_bsns" style="padding-left: 28px" oninput="BusinessInd()" placeholder="0.00" class="number form-control input-md text-right" />
                            <span>₱</span>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <span>CTC Amount</span>
                        <input name="ctl00$SectionBody$bsns_ctcamount" type="text" id="SectionBody_bsns_ctcamount" placeholder="₱ 0.00" class="number form-control input-md text-right" readonly="true" value="0.00" />
                    </div>
                </div>
            </div>
            <hr />
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-6 mt-2">
                        <span>SALARIES OR GROSS RECEIPT OR EARNINGS DERIVED FROM EXERCISE OF PROFESSION OR PURSUIT OF ANY OCCUPATION</span><br />
                        <span>(₱1.00 for every ₱1,000.00)</span>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <span>Annual Gross Income</span><br />
                        <div class="absolute-peso">
                            <input name="ctl00$SectionBody$optn" type="text" id="SectionBody_optn" style="padding-left: 28px" oninput="OccupationInd()" placeholder="0.00" class="number form-control input-md text-right" />
                            <span>₱</span>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <span>CTC Amount</span>
                        <input name="ctl00$SectionBody$optn_ctcamount" type="text" id="SectionBody_optn_ctcamount" placeholder="₱ 0.00" class="number form-control input-md text-right" value="0.00" readonly="true" />
                    </div>
                </div>
            </div>
            <hr />
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-6 mt-2">
                        <span>INCOME FROM REAL PROPERTY</span><br />
                        <span>(₱1.00 for every ₱1,000.00)</span>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <span>Annual Gross Income</span><br />
                        <div class="absolute-peso">
                            <input name="ctl00$SectionBody$rp" type="text" id="SectionBody_rp" style="padding-left: 28px" oninput="RealPropertyInd()" placeholder="0.00" class="number form-control input-md text-right" />
                            <span>₱</span>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <span>CTC Amount</span><br />
                        <input name="ctl00$SectionBody$rp_ctcamount" type="text" id="SectionBody_rp_ctcamount" placeholder="₱ 0.00" class="number form-control input-md text-right" value="0.00" readonly="true" />
                    </div>
                </div>
            </div>
            <hr />
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-6 mt-2 text-sm"></div>
                    <div class="col-sm-3 mt-2 text-bold">
                        <span id="SectionBody_lbl_stotal">Total taxable amount</span>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <input type="text" name="subtotal" id="ctcstotal" placeholder="₱ 0.00" class="number form-control input-md text-right" value="0.00" readonly="true" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="form-group">
                    <div class="col-sm-12 mt-2 text-italic text-sm">
                        <span id="SectionBody_lbl_interest2">*Non-payment within the last day of February will be charged with an interest rate of 24% per annum (Section 161 of RA 7160)</span>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="form-group">
                    <div class="col-sm-6 mt-2 text-sm"></div>
                    <div class="col-sm-3 mt-2 text-bold">
                        <span id="SectionBody_lbl_interest">Interest (24%)</span>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <input name="ctl00$SectionBody$ctcinterest" type="text" id="SectionBody_ctcinterest" placeholder="0.00" class="number form-control input-md text-right" readonly="true" />
                    </div>
                </div>
            </div>
            <div class="container" style="padding-bottom: 2rem">
                <div class="form-group">
                    <div class="col-sm-6 mt-2 text-sm"></div>
                    <div class="col-sm-3 mt-2 text-bold">
                        <span>Amount of CTC to be paid</span><br />
                    </div>
                    <div class="col-sm-3 mt-2">
                        <input type="text" name="tb_total" id="ctctotalamount" placeholder="₱ 0.00" class="number form-control input-md text-right" value="0.00" readonly="true" style="font-size: 24px; font: bold;" />
                    </div>
                </div>
            </div>
        </section>
        <div class="container" style="margin-bottom: 3rem">
            <div class="form-group text-center well" style="background-color: #f5e38d; color: #002148;">
                <strong>Tax due computed above is only a preliminary assessment. The amount due may be changed upon validation/assessment of CTO personnel.</strong><br />
                <strong>Please present the CTC Reference Number to the cashier for payment.</strong>
            </div>
            <div class="form-group" style="width: fit-content; margin: auto">
                <input type="submit" name="ctl00$SectionBody$ind_btnSubmit" value="SUBMIT" id="SectionBody_ind_btnSubmit" class="btn btn-primary btn-rounded text-bold" style="padding: 1rem 7rem; background-color: #004699; border: 1px solid #93c5ff;" />
            </div>
        </div>
      </section>

      <script type="text/javascript">
//<![CDATA[
alert('Session identity failed!'); window.location='index.aspx';//]]>


    <!-- Scripts -->
    <script src="../Scripts/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="../Scripts/bootstrap-3.2.0.min.js" type="text/javascript"></script>
    <script src="../Scripts/common.js" type="text/javascript"></script>
    
    <!-- number -->
    <script src="../Scripts/jquery.number.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('.number').number(true, 2);
    </script>
    <!-- cedula -->
    <script src="../Scripts/taxcertificate.js" type="text/javascript"></script>
    <script src="../Scripts/number.js" type="text/javascript"></script>
    <script type="text/javascript">
        const capitalize = document.querySelectorAll('.text-capitalize')

        Array.from(capitalize).forEach(item => {
            item.addEventListener('input', e => {
                e.target.value = e.target.value.toUpperCase()
            });
        });

        $(function () {
            $("#SectionBody_citizenship").change(function () {
                if ($(this).val() == "OTHER") {
                    $("#SectionBody_icr").prop("disabled", false);
                    $("#SectionBody_icr").prop("required", true);
                } else {
                    $("#SectionBody_icr").prop("disabled", true);
                    $("#SectionBody_icr").val('');
                }
            });
        });

        $(function () {
            const dt = new Date();
            let month = dt.getMonth();
            if (month == 0 || month == 1) {
                $("#SectionBody_ctcinterest").css("display", "none");
                $("#SectionBody_lbl_interest").css("display", "none");
            } else {
                $("#SectionBody_ctcinterest").show();
                $("#SectionBody_lbl_interest").show();
            }
        });

        $("#SectionBody_bsns").on("keyup", function () {
            var b = $('#SectionBody_bsns').val();
            var n = BusinessInd(b);
            $('#SectionBody_bsns_ctcamount').val(addCommas(n));
            totalIndividual();
        })

        $("#SectionBody_optn").on("keyup", function () {
            var b = $('#SectionBody_optn').val();
            var n = OccupationInd(b);
            $('#SectionBody_optn_ctcamount').val(addCommas(n));
            totalIndividual();
        })

        $("#SectionBody_rp").on("keyup", function () {
            var b = $('#SectionBody_rp').val();
            var n = RealPropertyInd(b);
            $('#SectionBody_rp_ctcamount').val(addCommas(n));
            totalIndividual();
        })

        ////-------------TOTAL COMPUTATION-----------/////
        function totalIndividual() {
            var indintrst;
            var month;
            switch (new Date().getMonth()) {
                case 0:
                    month = "jan";
                    var indintrst = 0;
                    break;
                case 1:
                    month = "feb";
                    var indintrst = 0;
                    break;
                case 2:
                    month = "march";
                    var indintrst = 0.24;
                    break;
                case 3:
                    month = "april";
                    var indintrst = 0.24;
                    break;
                case 4:
                    month = "may";
                    var indintrst = 0.24;
                    break;
                case 5:
                    month = "june";
                    var indintrst = 0.24;
                    break;
                case 6:
                    month = "july";
                    var indintrst = 0.24;
                    break;
                case 7:
                    month = "august";
                    var indintrst = 0.24;
                    break;
                case 8:
                    month = "september";
                    var indintrst = 0.24;
                    break;
                case 9:
                    month = "october";
                    var indintrst = 0.24;
                    break;
                case 10:
                    month = "november";
                    var indintrst = 0.24;
                    break;
                case 11:
                    month = "december";
                    var indintrst = 0.24;
                    break;
            }

            var basictax = $('#SectionBody_ind_bctctcamount').val();
            var bs = $('#SectionBody_bsns_ctcamount').val();
            var op = $('#SectionBody_optn_ctcamount').val();
            var rp = $('#SectionBody_rp_ctcamount').val();

            var ctc_bssnsIND = bs.replace(",", "");
            var ctc_bssnsIND = bs.replace(/,/g, "");

            var ctc_slry = op.replace(",", "");
            var ctc_slry = op.replace(/,/g, "");

            var ctc_amount_rlpropIND = rp.replace(",", "");
            var ctc_amount_rlpropIND = rp.replace(/,/g, "");

            var indtotal = parseFloat(ctc_bssnsIND) + parseFloat(ctc_slry) + parseFloat(ctc_amount_rlpropIND) + parseFloat(basictax);

            var indInterst = (indtotal * indintrst);
            var indtaxtotal = (indtotal + indInterst).toFixed(2);
            var indintrst5k = (indintrst * 5005);
            var indtotal5k = 5005;

            var a = 0;
            var b = 0;
            var c = 0;

            if (indtotal >= 5000) {
                var a = round((indtotal5k + indintrst5k), 2);
                var b = round(indintrst5k, 2);
                var c = round(indtotal5k, 2);
            }
            else if (indtotal < 5000) {
                var a = round(indtaxtotal, 2);
                var b = round(indInterst, 2);
                var c = round(indtotal, 2);
            }
            $('#ctctotalamount').val(addCommas(a));
            $('#SectionBody_ctcinterest').val(addCommas(b));
            $('#ctcstotal').val(addCommas(c));
        }

        $(document).ready(function () {
            totalIndividual();
        });
    </script>

      
    </body>
</html>