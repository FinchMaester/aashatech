<head>
    <?php
    use App\Models\Favicon;
    // $favicon = Favicon::first();
    ?>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!-- Mobile Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('venobox/dist/venobox.min.css') }}" type="text/css" media="screen" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon/' . $favicon->favicon_ico) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/favicon/' . $favicon->apple_touch_icon) }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/favicon/' . $favicon->favicon_thirtyTwo) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/favicon/' . $favicon->favicon_sixteen) }}">
    <link rel="manifest" href="{{ asset('uploads/favicon/file' . $favicon->file) }}">
    <link rel="manifest" href="{{ asset('uploads/favicon/file' . $favicon->favicon_ico) }}">

    <!-- Google reCAPTCHA -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch',
    ]) !!}

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const overlay = document.querySelector('.overlay');
            const expandedImage = document.querySelector('.overlay img');

            // Add click event listener to each image
            document.querySelectorAll('.gallery-image').forEach(image => {
                image.addEventListener('click', function(event) {
                    event.stopPropagation(); // Prevent event from propagating
                    // Display clicked image in overlay
                    expandedImage.src = this.src;
                    overlay.style.display = 'flex';
                });
            });

            // Add click event listener to overlay to close it
            overlay.addEventListener('click', function() {
                // Hide overlay
                overlay.style.display = 'none';
            });
        });
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/aasha.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
