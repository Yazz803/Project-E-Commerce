<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sec-1 {
            padding: 20px;
            width: 30%;
        }
        .sec-2 {
            width: 70%;
        }
        @media(max-width: 700px){
            div.login-form{
                display: inline !important;
            }
            .sec-1, .sec-2 {
                width: 100% !important;
            }
        }
    </style>
    <title>Halaman - {{ $title }}</title>
</head>
<body>
    
    <div class="main">
        @yield('container')
    </div>

    {{-- JS Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</body>
</html>