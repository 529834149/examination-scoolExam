<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '学校系统') - Laravel 进阶教程</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?{{time()}}" rel="stylesheet">
	<link href="{{ asset('default/layui-v2.5.4/layui/css/layui.css') }}?{{time()}}" rel="stylesheet">
</head>

<body>
    <div id="app" class="{{ route_class() }}-page">

        @include('layouts._header')

        <div class="container">

            @yield('content')

        </div>

        @include('layouts._footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?{{time()}}"></script>
	
</body>
</html>