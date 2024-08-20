<!doctype html>
<html lang="en">




@include('includes.head')

<body>

    @include('includes.preload')

    <main>

        @include('includes.navbar')



        @yield('content')





    </main>
    @include('includes.footer')

    <!-- JAVASCRIPT FILES -->
    @yield('team')
    @include('includes.footerjs')

</body>

</html>