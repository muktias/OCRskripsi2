<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Identifier Obat Resep/') }}</title>
    
    <!-- Logo -->
    <link rel="shortcut icon" href="{{ asset('icon.png') }}">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- include summernote css/js-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <div class="navbarfix">
            <nav class="shadowed">
                <div class="nav-container">
                    <div class="containerlogo">
                        <a class="logo" href="{{ url('/') }}">
                            <!-- {{ config('app.name', 'Laravel') }} -->
                            <img src="{{asset('../images/logo projek.png')}}" height="45%" width="45%">
                        </a>
                    </div>
                        <div class="header-right">
                            <a href="/catalogue">Katalog</a>
                            <a href="/about">Tentang</a>
                         </div>
                    </div>
                </nav>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    <script>
    
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
    }
    var modal = document.getElementById('Modal1');
    
    window.onclick = function(event){
        if(event.target==modal){
            modal.style.display="none";
        }
    }
    
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      modal.style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      modal.style.display = "none";
    }
    </script>
    

</body>
</html>

    