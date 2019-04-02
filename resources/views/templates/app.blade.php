<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>Transporter - @yield('titulo')</title>
    <link rel="stylesheet" 
          href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
          crossorigin="anonymous"
    >
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
        <div id="content">
                <div id="app">
                    <navbar-component></navbar-component>
                    <div class="container-fluid">                    
                        @yield('container')
                    </div>
                </div>
            </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>