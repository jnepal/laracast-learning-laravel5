<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ $title }}</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Base Address public Folder -->
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />

    </head>
    <body>
        @include('partials._nav')
        <div class="container">
             @include('partials._flash')
             @yield('content')
        </div>

        <script src="https:///code.jquery.com/jquery.js"></script>
        <script src="https:///maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <script>
            $('div.alert').not('.alert-important').delay(3000).slideUp();
        </script>


        @yield('footer');
    </body>
</html>

