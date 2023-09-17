<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title') {{ config('app.name', 'Laravel') }}</title>

    @include('layouts.head-css')

  </head>
  <body> <!-- justify-content-center align-items-center -->
    <div class="container-fluid p-0 m-0 contenedor">
        @yield('content')
    </div>

    @include('layouts.vendor-scripts')
  </body>
</html>
