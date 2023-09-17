<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="user" content="{{Auth::user()}}">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>@yield('title') {{ config('app.name', 'Laravel') }}</title>

@include('layouts.headv2-css')


<body class="font-muli theme-white gradient iconcolor">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>

    <div id="main_content">
        <div class="app" id="app">
        </div>
       {{--  @include('layouts.sidebar.master-sidebarv2')
        <!-- Start project content area -->
        <div class="page">
            <!-- Start Page header -->
            @include('layouts.topbar.master-topbarv2')
            <!-- Start Page title and tab -->
            <div class="app" id="app">
                @yield('content')
            </div>
            <!-- Start main footer -->
            <div class="section-body">
                @include('layouts.footerbar.master-footerbar')
            </div>
        </div> --}}
    </div>

    <script src="{{asset('js/app.js')}}" async defer> </script>

    @include('layouts.vendorv2-scripts')
</body>
</html>
