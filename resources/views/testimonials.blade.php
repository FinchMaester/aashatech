@extends('layouts.master')

@section('content')
    @include('includes.page_header')

    <section class="testimonial_page" id="sec-d6f6">
        <div class="container">
            <div class="row">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-6">
                        <div class="testimonial mx-5">
                            <div class="testimonial-content">
                                <p class="testimonial-para">{!! $testimonial->content !!}</p>
                                <h5 class="testimonial-name text-center">{{ $testimonial->title }}</h5>
                            </div>
                            <div class="testimonial-image-container">
                                <div class="text-image-wrap">
                                    <img class="testimonial-image" src="{{ asset($testimonial->image) }}"
                                    alt="{{ $testimonial->title }}">
                                </div>
                                
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
            </div>
        </div>
        <style>
            .testimonial-image {
                /* max-width: 90%;
                height: auto; */
                /* display: block;
                margin: 50px 10px 0; */
                /* Add margin to the right and bottom of each image */
                transition: transform 0.3s ease;
            }
            .testimonial-image-container img{
                height: 100%;
                width: 100%;
                border-radius: 50%;
            }
            .testimonial-image-container .text-image-wrap{
                height: 100px;
                width: 100px;
            }
            .testimonial-image-container{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .testimonial-image:last-child {
                margin-right: 0;
                /* Remove margin from the last image in each row */
            }
            .testimonial-content p{
                font-weight: 20px;
                line-height: 30px;
            }
        </style>
    </section>
@endsection
