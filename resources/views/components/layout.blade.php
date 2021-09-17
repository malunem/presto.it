<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <!-- link per tutto il CSS -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
          <!-- Add the slick-theme.css if you want default styling -->
        <title>
            {{$title ?? ''}}
        </title>

    </head>
    <body> 
        <x-navbar/>

        {{-- segnaposto generico --}}
        {{$slot}}

        <x-footer/>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
