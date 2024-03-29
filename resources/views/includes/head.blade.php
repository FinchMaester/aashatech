<head>
    <?php
    use App\Models\Favicon;
    // $favicon = Favicon::first();
    ?>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('venobox/dist/venobox.min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon/' . $favicon->favicon_ico) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/favicon/' . $favicon->apple_touch_icon) }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('uploads/favicon/' . $favicon->favicon_thirtyTwo) }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('uploads/favicon/' . $favicon->favicon_sixteen) }}">
    <link rel="manifest" href="{{ asset('uploads/favicon/file' . $favicon->file) }}">
    <link rel="manifest" href="{{ asset('uploads/favicon/file' . $favicon->favicon_ico) }}">

    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RDTXSELLCL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-RDTXSELLCL');
    </script>

    <!-- Custom JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.read-more').click(function(e) {
                e.preventDefault();
                $(this).hide();
                $(this).siblings('.more-text').show();
            });
        });
    </script>

    <!-- Swiper Slider -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.swiper-container', {
                direction: 'horizontal',
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/aasha.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    
</head>
