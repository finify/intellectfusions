<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Account</title>

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

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async
                src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-133433427-1');
        </script>

        <style>
            .user-type-button{
                cursor: pointer;
                background-color: rgba(0, 0, 0, 0.08);
                border-radius: 3px;
                font-weight: 450;
                font-size: 15px;
                line-height: 19px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }      
            .user-type-button svg{
                background-color:white;
                border-radius:50%;
            }      
            .user-type-active{
                background-color:#6223D2!important;
                color:white;
            }
            
        </style>
    </head>

    <body class="layout-login-centered-boxed">

         @yield('content')

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

    </body>

</html>