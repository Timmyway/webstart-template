<!DOCTYPE html>
<html class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:title" content="Webstart template" />
		<meta property="og:url" content="" />
		<meta property="og:image" content="" />
		<meta property="og:description" content="Template de base pour une petite application en PHP" />
        <title>Lite Webstart</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700;900&family=Open+Sans&display=swap" rel="stylesheet">        
        @yield('head')
    </head>
    <body class="antialised">
        <noscript>You need to enable JavaScript to run this app.</noscript>
        <div id="app" v-cloak class="flex flex-col min-h-screen">
            <header>
                @section('navbar')
                @include('partials.nav')
                @show
            </header>
            
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
        @section('scripts')
        @endsection
	</body>
</html>