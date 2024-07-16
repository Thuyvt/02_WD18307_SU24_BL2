<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>--}}

    <link href="{{asset('lib/bootstrap.css')}}" rel="stylesheet">
    <script src="{{asset('lib/bootstrap.js')}}"></script>
</head>
<body>
    <div class="container">
        <header class="bg-warning mb-5">HEADER</header>
        <main>
            <h1 class="mt-3 mb-3">@yield('title')</h1>
            <div class="row">
                @yield('content')
            </div>
        </main>
        <footer class="bg-success mt-5">FOOTER</footer>
    </div>
</body>
</html>
