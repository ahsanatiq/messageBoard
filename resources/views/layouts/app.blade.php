<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    {!! Html::style(mix('/css/app.css')) !!}
    @yield('header')
</head>
<body>
    @yield('content')

    <footer class="footer">
        <div class="container">
            <p class="text-muted">&copy; {{ date('Y').' '.config('app.name').'. All rights reserved.'}}</p>
        </div>
    </footer>
    {!! Html::script(mix('/js/app.js')) !!}
    @yield('footer')
</body>
</html>
