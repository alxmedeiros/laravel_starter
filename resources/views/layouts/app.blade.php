@include('layouts.partials.head')
<body class="animsition site-menubar-fold site-menubar-keep">

    <div id="app">

        <!-- System's messages -->
        @include('layouts.partials.system-messages')

        <!-- Navigation -->
        @include('layouts.partials.navigation')

        <!-- Page -->
        @yield('content')
        <!-- End Page -->

        <!-- Footer -->
{{--        @include('layouts.partials.footer')--}}
    </div>

    @include('layouts.partials.scripts')
</body>
</html>