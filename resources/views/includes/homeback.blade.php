<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($backimages as $backimage)
                        @if (!empty($backimage->img) && is_array($backimage->img))
                            <div class="swiper-slide">
                                <div class="swiper-image">
                                    <img class="img-fluid" src="{{ asset($backimage->img[0]) }}" alt="{{ $backimage->title }}">
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $backimage->title }}</h5>
                                    <p>{{ $backimage->img_desc }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>

                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            spaceBetween: 10, // Initial space between slides

            // Autoplay settings
            autoplay: {
                delay: 3000, // Auto-slide interval in milliseconds (3 seconds)
                disableOnInteraction: false, // Allow user interaction to stop autoplay
            },

            // If you have pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Responsive breakpoints
            breakpoints: {
                // when window width is <= 576px
                576: {
                    slidesPerView: 1,
                    spaceBetween: 5, // Adjust space between slides
                },
                // when window width is <= 768px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                // when window width is <= 992px
                992: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                // when window width is <= 1200px
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });
    });
</script>

<style>
    .swiper-container {
        overflow: hidden;
        /* Hide overflow to ensure only visible slides are shown */
    }
    .swiper-container .carousel-caption{
       height:150px ;
       margin: 0px;
       padding: 0px;
       overflow: hidden;
    }
    .swiper-image .img-fluid{
            height:200px;
            width: 100%;
        }
</style>
<style>
    /* Customize the next and previous arrow buttons */
    .swiper-button-next,
    .swiper-button-prev {
        color: white;
        /* Set the color */
        background-color: rgba(0, 1, 0, 0.5);
        /* Set the background color with some transparency */
        border-radius: 50%;
        /* Make the buttons round */
        width: 40px;
        /* Set the width */
        height: 40px;
        /* Set the height */
        display: flex;
        /* Use flexbox for centering */
        justify-content: center;
        /* Center horizontally */
        align-items: center;
        /* Center vertically */
        position: absolute;
        /* Position the buttons */
        top: 50%;
        /* Position at the vertical center */
        transform: translateY(-50%);
        /* Adjust for vertical centering */
        z-index: 10;
        /* Ensure the buttons appear above the slides */
        transition: background-color 0.3s ease;
        /* Add a smooth transition for hover effect */
    }

    /* Hover effect for next and previous arrow buttons */
    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background-color: rgba(0, 0, 0, 0.8);
        /* Darken the background color on hover */
        cursor: pointer;
        /* Show pointer cursor on hover */
    }

    /* Adjust position of the previous button */
    .swiper-button-prev {
        left: 10px;
        /* Position the previous button on the left side */
    }

    /* Adjust position of the next button */
    .swiper-button-next {
        right: 10px;
        /* Position the next button on the right side */
    }

    /* Make pagination responsive */
    .swiper-pagination {
        bottom: 10px;
        /* Position the pagination at the bottom */
    }
</style>
