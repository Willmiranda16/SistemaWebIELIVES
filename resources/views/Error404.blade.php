<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>Error 404 | {{ config('app.name', 'Laravel') }}</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" />

<!-- Core css -->
<link rel="stylesheet" href="{{ URL::asset('assets/css/style.min.css')}}"/>

<link rel="shortcut icon" href="{{ URL::asset('assets/images/cao.ico') }}">

</head>
<body class="font-muli theme-cyan gradient">

<div class="auth option2">
    <div class="auth_left">
        <div class="card">
            <div class="card-body text-center">
                <div class="display-1 text-muted mb-5">
                    {{-- <i class="si si-exclamation"></i> 404 --}}
                    <img src="https://www.designrush.com/uploads/users/customer-11/image_1530905677_TfTLA1D0ueXh4hOj8hb4zpbDxjpm8jnMoINOk5uu.jpeg" alt="error_404">
                </div>
                <h1 class="h3 mb-3">Ups... Página no encontrada...</h1>
                <p class="h6 text-muted font-weight-normal mb-3">Lo sentimos, esta página no está disponible actualmente…&hellip;</p>
                <a class="btn btn-primary" href="javascript:history.back()"><i class="fe fe-arrow-left mr-2"></i>Regresar</a>
            </div>
        </div>
    </div>
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="{{ URL::asset('assets/bundles/lib.vendor.bundle.js')}}"></script>

<!-- Start project main js  and page js -->
<script src="{{ URL::asset('assets/js/core.js')}}"></script>
</body>
</html>
