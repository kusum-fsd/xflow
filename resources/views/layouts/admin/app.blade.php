<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('layouts.admin.header')

        <!-- Main Sidebar Container -->

        @include('layouts.admin.sidebar')


        <div class="content-wrapper">

            @yield('content')

        </div>

        {{-- footer --}}
        @include('layouts.admin.footer')

    </div>

    <!--./wrapper -->

    @include('layouts.admin.js')

    @yield('javascript')
    @yield('delete_pop')
    @yield('form_switch')

</body>

</html>
