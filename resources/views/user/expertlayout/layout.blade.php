<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Studyhub</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="/dashassets/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="/dashassets/css/app.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/css/app.rtl.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="/dashassets/css/vendor-material-icons.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/css/vendor-material-icons.rtl.css"
              rel="stylesheet">

        <!-- Font Awesome FREE Icons -->
        <link type="text/css"
              href="/dashassets/css/vendor-fontawesome-free.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/css/vendor-fontawesome-free.rtl.css"
              rel="stylesheet">

        

        <!-- Flatpickr -->
        <link type="text/css"
              href="/dashassets/css/vendor-flatpickr.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/css/vendor-flatpickr.rtl.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/css/vendor-flatpickr-airbnb.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/css/vendor-flatpickr-airbnb.rtl.css"
              rel="stylesheet">

        <!-- Vector Maps -->
        <link type="text/css"
              href="/dashassets/vendor/jqvmap/jqvmap.min.css"
              rel="stylesheet">

      <style>
            .bg-darker{
                  background-color:#6223D2!important;
            }
      </style>
        @yield('header')
    </head>
    <body class="layout-default">

        <div class="preloader"></div>

        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">

            @include('user.layout.header')

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content">

                <div class="mdk-drawer-layout js-mdk-drawer-layout"
                    data-push
                    data-responsive-width="992px">
                    <div class="mdk-drawer-layout__content page">

                        @yield('content')

                    </div>
                    <!-- // END drawer-layout__content -->

                    @include('user.layout.footer')
                </div>
                <!-- // END drawer-layout -->

            </div>
            <!-- // END header-layout__content -->

        </div>
        <!-- // END header-layout -->

        <!-- App Settings FAB -->
        <!-- <div id="app-settings">
            <app-settings layout-active="default"
                        :layout-location="{
        'default': 'index.html',
        'fixed': 'fixed-dashboard.html',
        'fluid': 'fluid-dashboard.html',
        'mini': 'mini-dashboard.html'
        }"></app-settings>
        </div> -->

        <!-- jQuery -->
        <script src="/dashassets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="/dashassets/vendor/popper.min.js"></script>
        <script src="/dashassets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="/dashassets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="/dashassets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="/dashassets/vendor/material-design-kit.js"></script>

        <!-- App -->
        <script src="/dashassets/js/toggle-check-all.js"></script>
        <script src="/dashassets/js/check-selected-row.js"></script>
        <script src="/dashassets/js/dropdown.js"></script>
        <script src="/dashassets/js/sidebar-mini.js"></script>
        <script src="/dashassets/js/app.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="/dashassets/js/app-settings.js"></script>

        <!-- Flatpickr -->
        <script src="/dashassets/vendor/flatpickr/flatpickr.min.js"></script>
        <script src="/dashassets/js/flatpickr.js"></script>

        <!-- Global Settings -->
        <script src="/dashassets/js/settings.js"></script>

        <!-- Moment.js -->
        <script src="/dashassets/vendor/moment.min.js"></script>
        <script src="/dashassets/vendor/moment-range.js"></script>

        <!-- Chart.js -->
        <script src="/dashassets/vendor/Chart.min.js"></script>

        <!-- App Charts JS -->
        <script src="/dashassets/js/charts.js"></script>
        <script src="/dashassets/js/chartjs-rounded-bar.js"></script>

        <!-- Chart Samples -->
        <script src="/dashassets/js/page.dashboard.js"></script>
        <script src="/dashassets/js/progress-charts.js"></script>

        <!-- Vector Maps -->
        <script src="/dashassets/vendor/jqvmap/jquery.vmap.min.js"></script>
        <script src="/dashassets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="/dashassets/js/vector-maps.js"></script>
        @yield('footer')
    </body>
</html>