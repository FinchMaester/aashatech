@extends('layouts.master')

@section('content')
    @include('includes.page_header')

    <!-- Include the VenoBox CSS -->
    <link rel="stylesheet" href="{{ asset('venobox/dist/venobox.min.css') }}" type="text/css" media="screen" />

    <style>
        .gallery-item {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
            height: 400px;
            
        }

        .gallery-item a img{
            width: 100%;
          height: 300px;
          object-fit: cover;
        }

        .additional-images {

            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;


        }

        .gallery-item:hover .additional-images {
            opacity: 1;
        }

        .additional-images a {
            margin: 1px;
        }

        .additional-images a img {
            width: 70px;
            height: 70px;
            border: 2px solid #fff;
            object-fit: cover;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
        }

        .additional-images a:hover img {
            transform: scale(1..05);
        }
    </style>

    <section class="gallery m-3">
        <div class="container">
            <div class="row">
                @foreach ($images as $image)
                    <div class="col-md-4 mb-4">
                        <div class="gallery-item">
                            <a href="{{ asset($image->img[0]) }}" class="venobox" data-gall="{{ $image->title }}"
                                data-title="{{ $image->img_desc }}">
                                <img src="{{ asset($image->img[0]) }}" alt="{{ $image->title }}">
                            </a>
                            @if (count($image->img) > 1)
                                <div class="additional-images">
                                    @for ($i = 1; $i < count($image->img); $i++)
                                        <a href="{{ asset($image->img[$i]) }}" class="venobox"
                                            data-gall="{{ $image->title }}" data-title="{{ $image->img_desc }}">
                                            <img src="{{ asset($image->img[$i]) }}" alt="{{ $image->title }}">
                                        </a>
                                    @endfor
                                </div>
                            @endif
                            <div class="text-center mt-2">
                                <h4>{{ $image->title }}</h4>
                                <p>{{ $image->img_desc }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Include the VenoBox JavaScript -->
    <script type="text/javascript" src="{{ asset('venobox/dist/venobox.min.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new VenoBox({
                numeration: true,
                infinigall: true,
                share: true,
                spinner: 'rotating-plane'
            });
        });
    </script>
@endsection
