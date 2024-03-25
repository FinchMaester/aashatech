@extends('layouts.master')
{{-- @dd($favicon); --}}



@section('content')


    <body class="u-body u-xl-mode" data-lang="en">




        <section class="u-align-left u-clearfix u-section-1" id="carousel_560d">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-shape u-shape-svg u-text-custom-color-2 u-shape-1" data-animation-name="fadeIn"
                    data-animation-duration="1000" data-animation-direction="Right">
                    <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 150" style="">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4d96"></use>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        xml:space="preserve" class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-4d96">
                        <path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1
                                                                    c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1
                                                                    c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2
                                                                    C6.9,115.6,25.2,125.2,43.2,126.9z">
                        </path>
                    </svg>
                </div>
                <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
                    <div class="u-gutter-0 u-layout">
                        <div class="u-layout-row">
                            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                                <div class="u-container-layout u-container-layout-1">
                                    <img class="u-expanded-width-xs u-image u-image-default u-image-1"
                                        src="{{ asset('uploads/sitesetting/' . $sitesetting->side_logo ?? '') }}"
                                        alt="" data-image-width="1496" data-image-height="728">
                                    <h6 class="u-text u-text-default u-text-1">{{ $sitesetting->slogan }}</h6>
                                    <p class="u-text u-text-2">{{ $sitesetting->desc }}
                                    </p>

                                    <a href="{{ route('Contact.store') }}"
                                        class="u-active-grey-90 u-border-none u-btn u-btn-round u-button-style u-color-scheme-summer-time u-color-style-multicolor-1 u-custom-color-1 u-hover-custom-color-2 u-radius-50 u-text-active-white u-text-body-alt-color u-text-hover-white u-btn-2">Get
                                        in Touch</a>
                                </div>
                            </div>
                            <div class="u-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                                <div class="u-container-layout u-container-layout-2">
                                    <div class="u-carousel u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gallery u-gallery-slider u-layout-carousel u-lightbox u-no-transition u-show-text-on-hover u-gallery-1"
                                        id="carousel-f035" data-interval="5000" data-u-ride="carousel">
                                        <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">
                                            <li data-u-target="#carousel-f035" data-u-slide-to="0"
                                                class="u-active u-grey-70 u-shape-circle"
                                                style="width: 10px; height: 10px;"></li>
                                            <li data-u-target="#carousel-f035" data-u-slide-to="1"
                                                class="u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
                                        </ol>
                                        <div class="u-carousel-inner u-gallery-inner" role="listbox">
                                            <div
                                                class="u-active u-carousel-item u-effect-fade u-gallery-item u-carousel-item-1">
                                                <div class="u-back-slide" data-image-width="1280" data-image-height="853">
                                                    <img class="u-back-image u-expanded"
                                                        src="images/c26adb597274adf43dffb59a2badab3bbb1f0041532ac3283644b6c3fb831e44359a9ad3e760efe956fccc64838b8e40b10d102244512ce7525212_1280.jpg">
                                                </div>
                                                <div
                                                    class="u-align-center u-over-slide u-shading u-valign-bottom u-over-slide-1">
                                                    <h3 class="u-gallery-heading">Artificial Intelligence</h3>

                                                </div>
                                            </div>  

                                            @foreach ($coverimages as $coverimage)
                                                <div class="u-carousel-item u-effect-fade u-gallery-item u-carousel-item-2">
                                                    <div class="u-back-slide" data-image-width="1280"
                                                        data-image-height="853">
                                                        <img class="u-back-image u-expanded"
                                                            src="{{ asset($coverimage->image) }}">
                                                    </div>
                                                    <div
                                                        class="u-align-center u-over-slide u-shading u-valign-bottom u-over-slide-2">
                                                        <h3 class="u-gallery-heading">{{ $coverimage->title }}</h3>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-1"
                                            href="#carousel-f035" role="button" data-u-slide="prev">
                                            <span aria-hidden="true">
                                                <svg viewBox="0 0 451.847 451.847">
                                                    <path
                                                        d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
                                                                                                        c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
                                                                                                        c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="sr-only">
                                                <svg viewBox="0 0 451.847 451.847">
                                                    <path
                                                        d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
                                                                                                c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
                                                                                                c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                        <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-2"
                                            href="#carousel-f035" role="button" data-u-slide="next">
                                            <span aria-hidden="true">
                                                <svg viewBox="0 0 451.846 451.847">
                                                    <path
                                                        d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
                                                                                                L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
                                                                                                c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="sr-only">
                                                <svg viewBox="0 0 451.846 451.847">
                                                    <path
                                                        d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
                                                                                                    L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
                                                                                                    c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                @include('includes/homeback')
            {{-- </div>
        </section>
        <!-- Form for uploading images -->
        <form id="uploadForm" enctype="multipart/form-data" action="{{ route('image.upload') }}" method="post">
            @csrf
            <input type="file" name="image" id="image">
            <button type="submit">Upload</button>
        </form>

        <!-- Div to display the compressed image -->
        <div id="output"></div> --}}








        <section class="u-align-center u-clearfix u-grey-10 u-section-2" id="carousel_987a">
            <div class="u-clearfix u-sheet u-sheet-1">


                <div class="u-custom-color-1 u-shape u-shape-circle u-shape-1" data-animation-name="fadeIn"
                    data-animation-duration="1000" data-animation-direction="Right" data-animation-delay="0"></div>
                <div class="u-custom-color-2 u-shape u-shape-circle u-shape-2" data-animation-name="fadeIn"
                    data-animation-duration="1000" data-animation-direction="Right" data-animation-delay="0"></div>
                <img class="u-image u-image-1" src="{{ asset('uploads/about/' . $about->image) }}" data-image-width="800"
                    data-image-height="533" data-animation-name="fadeIn" data-animation-duration="1000"
                    data-animation-direction="Up" data-animation-delay="250">
                <div class="u-align-left u-container-style u-group u-white u-group-1" data-animation-name="fadeIn"
                    data-animation-duration="1000" data-animation-direction="Left" data-animation-delay="250">
                    <div class="u-container-layout u-container-layout-1">
                        <h2
                            class="u-text u-text-custom-color-1 u-text-default-lg u-text-default-md u-text-default-sm u-text-default-xl u-text-1">
                            {{ $about->title }}</h2>
                        <p class="u-text u-text-2">{{ Str::substr($about->description, 0, 180) }}...
                        </p>
                        <a href="{{ route('About') }}"
                            class="u-active-custom-color-2 u-border-none u-btn u-btn-round u-button-style u-color-scheme-summer-time u-color-style-multicolor-1 u-custom-color-1 u-hover-custom-color-2 u-radius-50 u-text-active-white u-text-body-alt-color u-text-hover-white u-btn-1">Learn
                            more</a>
                    </div>
                </div>

            </div>
        </section>


        @include('includes/count')
        @include('includes/teams')
        @include('includes/productone')
        @include('includes/project')
        @include('includes/testimonials')
        @include('includes/producttwo')
        @include('includes/instagram')
        @include('includes/idea')
        @include('includes/advisor')



        @include('includes/clientlist')
        @include('includes/contact')
        @include('includes/blogs')





        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
        <script>
            document.getElementById('uploadForm').addEventListener('submit', function(event) {
                event.preventDefault();

                var formData = new FormData();
                formData.append('image', document.getElementById('image').files[0]);

                axios.post('/compress-image', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(response) {
                        // Log the response to the console
                        console.log(response);

                        // Check if the response contains the path
                        if (response.data.path) {
                            // If the path is available, display the compressed image
                            document.getElementById('output').innerHTML = '<img src="' + response.data.path +
                                '" alt="Compressed Image">';
                        } else {
                            // If the path is not available, display an error message
                            console.error('Path to compressed image not found in response.');
                        }
                    })
                    .catch(function(error) {
                        console.error('Error uploading image:', error);
                    });
            });
        </script>

        <script>
            const delay = 3000; //ms

            const slides = document.querySelector(".slides");
            const slidesCount = slides.childElementCount;
            const maxLeft = (slidesCount - 1) * 100 * -1;

            let current = 0;

            function changeSlide(next = true) {
                if (next) {
                    current += current > maxLeft ? -100 : current * -1;
                } else {
                    current = current < 0 ? current + 100 : maxLeft;
                }

                slides.style.left = current + "%";
            }

            let autoChange = setInterval(changeSlide, delay);
            const restart = function() {
                clearInterval(autoChange);
                autoChange = setInterval(changeSlide, delay);
            };

            // Controls
            document.querySelector(".next-slide").addEventListener("click", function() {
                changeSlide();
                restart();
            });

            document.querySelector(".prev-slide").addEventListener("click", function() {
                changeSlide(false);
                restart();
            });
        </script>





    @stop
