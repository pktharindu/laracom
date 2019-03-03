<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="/css/backend.css" rel="stylesheet" type="text/css" />

    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <title>Laracom Admin</title>

    <script type='text/javascript'>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
    </script>
</head>

<body>
    <div id="app">
        @include('backend.partials.header')

        <div class="container-fluid">
            <div class="row">
                @include('backend.partials.sidebar')

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @include('backend.partials.messages')
                    @yield('content')
                    @include('backend.partials.footer')
                </main>

            </div>
        </div>
        
    </div>

    <script type="text/javascript" src="/js/backend.js"></script>

    @stack('scripts')
</body>

</html>