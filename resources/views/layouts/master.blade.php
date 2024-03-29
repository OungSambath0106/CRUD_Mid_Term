<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title', 'Index') </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .main {
            display: flex;
        }

        .main>.side-left {
            background-color: #e2e3e5;
            flex: 1;
        }

        .main>.content {
            flex: 6;
        }
    </style>

    @stack('styles')

</head>

<body>
    <div class="wrapper">
        @include('layouts.navbar')
        <div class="main">
            <div class="content">
                @yield('main')
                
            </div>
        </div>
        <div class="footer">

        </div>
    </div>
</body>

</html>
