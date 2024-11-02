<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home')</title>

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/e3b4af92a1.js" crossorigin="anonymous"></script>

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- DataTables CSS --}}
    @yield('css-datatables')

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- CSS custom global --}}
    <link rel="stylesheet" href="{{ asset('css/style-global.css') }}">

    {{-- CSS custom page --}}
    @yield('css')

</head>

<body>

    <div class="wrapper d-flex">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main content -->
        <div class="main w-100">
            <!-- nav -->
            <nav class="navbar">
                <!-- volver al inicio (home)-->

                 <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-now" href="{{ route('home') }}">Inicio</a></li>
                        @yield('breadcrumb')
                    </ol>
                </nav>

                {{-- <div class="text-left">
                    <h6 class="title text-uppercase">@yield('title', 'Home')</h6>
                </div> --}}


                <div class="text-right">
                  
                    @yield('nav-menu')
                    <a href="{{ route('home') }}" class="navbar-brand"><i class="fa-solid fa-house"></i></a>
                </div>

            </nav>
            <!-- end nav -->

            <!-- Page content -->
            <div class="container-fluid">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    {{-- JS global --}}
    <script src="{{ asset('js/script-global.js') }}"></script>

    {{-- DataTables JS --}}
    @yield('js-datatables')

    {{-- JS custom page --}}
    @yield('js')

</body>

</html>
