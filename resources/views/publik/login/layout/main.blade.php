<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css"
    rel="stylesheet"
    />
    <style>
        body::before{
            content: '';
            background-image: linear-gradient(
                rgba(0, 0, 0, 0.2),
                rgba(0, 0, 0, 0.2)
            ),
            url('/assets/img/bgwkshop.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            z-index: -1;
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
        }
    </style>
    <title>{{ $title }}</title>
</head>
<body>

    @yield('content')
    
    {{-- Sweet Alert --}}
    @include('sweetalert::alert')
    
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"
    ></script>
</body>
</html>