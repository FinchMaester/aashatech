<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('ad/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <style>
        /* Style for overlay container */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            /* Ensure it's above most elements */
        }

        .overlay img {
            max-width: 90%;
            max-height: 90%;
        }
    </style>
</head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>

</html>
