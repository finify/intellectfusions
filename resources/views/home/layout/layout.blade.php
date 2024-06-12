<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Home | Edison</title>
        <script id="www-widgetapi-script" src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vflS50iB-/www-widgetapi.js" async=""></script>
        <script src="https://www.youtube.com/player_api"></script>
        <link rel="stylesheet preload" as="style" href="/homeassets/css/preload.min.css" />
        <link rel="stylesheet preload" as="style" href="/homeassets/css/icomoon.css" />
        <link rel="stylesheet preload" as="style" href="/homeassets/css/libs.min.css" />

        
       
      
        @yield('header')
    </head>
    <body>
        @include('home.layout.header')
        <!-- homepage content start -->
        <main>
            @yield('content')
        </main>
        <!-- homepage content end -->
        @include('home.layout.footer')

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/66673be29a809f19fb3c231b/1i01k3s0i';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <script src="/homeassets/js/common.min.js"></script>
        <script src="/homeassets/js/reviews.min.js"></script>
        <script src="/homeassets/js/map.min.js"></script>
    </body>
</html>