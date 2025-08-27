<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

</head>

        @hasSection('css')
            @yield('css')
        @endif

<body id="page-top">

        @include('components.admin.navbar')

        <!-- Page Wrapper -->
     <div id="wrapper">

        @include('components.admin.sidebar')

        @hasSection('contents')
            @yield('contents')
        @endif

     </div>

        <!--[scipts]--->

        @livewireScripts
        @livewireScriptConfig

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>



        <!-- Pusher -->
        {{--         <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>--}}
        {{--         <script>--}}
        {{--             var pusher = new Pusher('68ddaf7150dde8f203ae', {--}}
        {{--                 cluster: 'ap1'--}}
        {{--             });--}}

        {{--             var channel = pusher.subscribe('admin-notifications');--}}
        {{--             channel.bind('new-applicant', function(data) {--}}

        {{--                 let badge = document.getElementById('badge-counter');--}}
        {{--                 let currentCount = parseInt(badge.textContent) || 0;--}}
        {{--                 badge.textContent = currentCount + 1;--}}

        {{--                 let notificationList = document.getElementById('alert-items');--}}
        {{--                 let newNotification = `--}}
        {{--                                <a class="dropdown-item d-flex align-items-center" href="pending.php">--}}
        {{--                                    <div class="mr-3">--}}
        {{--                                        <div class="icon-circle bg-primary">--}}
        {{--                                            <i class="fas fa-file-alt text-white"></i>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div>--}}
        {{--                                        <div class="small text-gray-500">${new Date().toLocaleDateString()}</div>--}}
        {{--                                        <span class="font-weight-bold">${data.message}</span>--}}
        {{--                                    </div>--}}
        {{--                                </a>--}}
        {{--                            `;--}}
        {{--                 notificationList.insertAdjacentHTML('afterbegin', newNotification);--}}
        {{--             });--}}

        {{--         </script>--}}

        @hasSection('js')
            @yield('js')
        @endif

        @hasSection('custom-js')
            @yield('custom-js')
        @endif

</body>

</html>
