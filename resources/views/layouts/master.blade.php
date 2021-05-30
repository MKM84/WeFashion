<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device.width, initial-scale=1">
    <title>WE FASHION</title>
    <link rel="icon" href="{!! asset('wefashion.png') !!}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>
    <div class="body-container">
        <header class="mw-100">
            @yield('menu')
        </header>
        <section class="container-fluid">
            <div class="col-md-12">
                @yield('content')
            </div>
            <div class="col-md-12 text-center">
                @yield('pagination')
            </div>
        </section>
    </div>
    @yield('footer')
    @section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    @show
</body>

</html>