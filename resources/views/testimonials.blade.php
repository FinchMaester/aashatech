@extends('layouts.master')

@section('content')
    @include('includes.page_header')

    <section class="testimonial_page" id="sec-d6f6">
        <div class="container">
            <div class="row">
                @foreach ($testimonials as $testimonial)
                    <div class="col-md-3 mb-4">
                        <div class="testimonial">
                            <div class="testimonial-image-container">
                                <img class="testimonial-image" src="{{ asset($testimonial->image) }}"
                                    alt="{{ $testimonial->title }}">
                            </div>
                            <div class="testimonial-content">
                                <p class="testimonial-para">{!! $testimonial->content !!}</p>
                                <h5 class="testimonial-name">{{ $testimonial->title }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <style>
            .testimonial-image {
                max-width: 90%;
                height: auto;
                display: block;
                margin: 50px 10px 0;
                /* Add margin to the right and bottom of each image */
                transition: transform 0.3s ease;
            }

            .testimonial-image:last-child {
                margin-right: 0;
                /* Remove margin from the last image in each row */
            }
        </style>
    </section>
@endsection
