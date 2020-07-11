<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accordous</title>

        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <style>
            .dataTables_empty {display: none}
        </style>
    </head>
    <body>
        <div class="container">
            
            @yield('content')

        </div>

        <script src="{{asset('js/app.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    </body>
</html>
