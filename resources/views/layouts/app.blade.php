<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.parts.css')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('images/logo.jpg') }}" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        @include('layouts.navbar')

     @include('layouts.parts.menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        @include('layouts.parts.footer')
    </div>
    <!-- ./wrapper -->

   @include('layouts.parts.js')
</body>

</html>
