<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/svg+xml" href="{{ asset('site/assets/Favicon_Plantagro.svg') }}" />    
    <link rel="stylesheet" href="{{ asset('site/css/styles.css') }}">

    <!--Roboto Font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--SplideCSS CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.8.0/dist/css/splide-extension-video.min.css">

    <title>Plantagro | Cotação Agrícola</title>
</head>
<body class=""> 
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->            
    <footer class="absolute bottom-0 inset-x-0 space-y-5 4k:space-y-10 z-10 w-[calc(100-31.615)%]">
        <img src="{{ asset('site/assets/images/Arte Lateral Esquerda.svg') }}" alt="" class="fixed bottom-0 left-0 max-w-md 4k:max-w-4xl"/>
        <p class="text-gray-600 text-2xl 4k:text-5xl w-2/3 ml-auto text-center">Valores referenciados pela região de Ponta Grossa-PR</p>               
        <div class="h-36 4k:h-72 bg-green flex items-center justify-end pr-32 4k:pr-64">
            <div class="text-gray-900 text-5xl 4k:text-8xl font-bold inline-flex">
                <span id="weekday"></span>
                <span class="pr-5 4k:pr-10 font-normal">,</span> 
                <span id="date"></span>
                <span class="px-5 4k:px-10 font-normal">|</span>                
                <span id="clock"></span>               
            </div>
        </div>
    </footer>
    
    <!-- JQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!--SplideJS-->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.8.0/dist/js/splide-extension-video.min.js"></script>
    {{-- <script src="{{ asset('site/js/splide.js') }}"></script> --}}
    
     <!--My Script-->
     {{-- <script src="{{ asset('site/js/index.js') }}"></script> --}}
     @stack('scripts')
     <script>
        
     </script>
</body>
</html>
