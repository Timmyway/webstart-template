<!DOCTYPE html>
<html class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:title" content="Webstart template" />
		<meta property="og:url" content="" />
		<meta property="og:image" content="" />
		<meta property="og:description" content="{{ $description }}" />
        @yield('head')
        <title>{{ $title }}</title>
        <!-- Fonts -->
        @section('fonts')
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700;900&family=Open+Sans&display=swap" rel="stylesheet">
        @show
    </head>
    <body class="antialised">
        <div id="app" v-cloak>            
            @yield('content')            

            @section('footer')
            @include('partials.footer')
            @show
        </div>        

        <!-- if development -->
		<script type="module" src="http://127.0.0.1:5173/@vite/client"></script>
        @section('vuescript')
		<script type="module" src="http://127.0.0.1:5173/views/src/entries/mainBundle.js"></script>
        @show
	</body>
</html>