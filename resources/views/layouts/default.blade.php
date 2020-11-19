<html>
    <head>
        <title>@yield('title')</title>
        @include('includes.templates.head-rex')
    </head>
    <body>
    <!-- BEGAIN PRELOADER -->
    <div id="preloader">
        <div class="loader">&nbsp;</div>
    </div>
    <style>
        @media(max-width: 425px) {
            .loader {
                left: calc(50% - 11em/2);
                top: 200px;
            }
        }
    </style>
    <!-- END PRELOADER -->
    @yield('content')
    </body>
</html>
