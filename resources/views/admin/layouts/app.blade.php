@include('admin.layouts.partials.head')
<body class="animsition">

    <div id="app">

        <!-- System's messages -->
        @include('admin.layouts.partials.system-messages')

        <!-- Navigation -->
        @include('admin.layouts.partials.navigation')

        <!-- Page -->
        @yield('content')
        <!-- End Page -->

        <!-- Footer -->
        @include('admin.layouts.partials.footer')
    </div>

    @include('admin.layouts.partials.scripts')
</body>
</html>