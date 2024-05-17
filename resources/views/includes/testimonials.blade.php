<section class="u-align-center u-clearfix u-image u-section-6" id="carousel_0e7a" data-image-width="1280"
    data-image-height="857"
    style="background-image: url({{ asset('images/cb5860d6ba9becf38399366c551cdfcded55c89d91ef6861f0ae0a7bb8b94daa639ccc0bdcdb862e349af731ad1c863702007124c2266525b16f97_1280.jpg') }})">
    <div class="u-clearfix u-sheet u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <h2 class="u-text u-text-body-alt-color u-text-default u-text-1">Get To Know Us Better</h2>
        <div id="carousel-5989" data-interval="5000" data-u-ride="carousel" class="u-carousel u-slider u-slider-1">
            <div class="u-carousel-inner" role="listbox">
                <div class="u-active u-carousel-item u-container-style u-slide u-white u-carousel-item-1">
                    <div class="u-container-layout u-valign-top u-container-layout-1">
                        <img class="testimonial_image" src="{{ asset('images/logopu.png') }}" alt="testimonial_image">
                        <div class="testimonial-content-container">
                            <p class="u-align-center u-large-text u-text u-text-variant u-text-2">
                                "The software has been very helpful in managing scholarship applications and keeping
                                track
                                of them.
                                It is user-friendly and we find it really easy to use and the functionality is great. It
                                has
                                helped us to be more efficient and
                                organized in our recruitment of the scholarship granted students."
                            </p>
                            <h4 class="u-align-center u-text u-text-custom-color-1 u-text-default u-text-3">
                                Roshan Pandey
                            </h4>
                        </div>
                    </div>
                </div>

                @foreach ($testimonials as $testimonial)
                    <div class="u-carousel-item u-container-style u-slide u-white u-carousel-item-2">
                        <div class="u-container-layout u-valign-middle u-container-layout-2">
                            <img class="testimonial_image" src="{{ asset($testimonial->image) }}"
                                alt="testimonial_image">
                            <div class="testimonial-content-container">
                                <p class="u-align-center u-large-text u-text u-text-variant u-text-2">
                                    {!! htmlspecialchars(strip_tags($testimonial->content)) !!}</p>
                                <h4 class="u-align-center u-text u-text-custom-color-1 u-text-default u-text-3 mb-2">
                                    {{ $testimonial->title }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-grey-5 u-spacing-13 u-text-grey-40 u-carousel-control-1"
                href="#carousel-5989" role="button" data-u-slide="prev">
                <span aria-hidden="true">
                    <svg viewBox="0 0 477.175 477.175">
                        <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                        c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z">
                        </path>
                    </svg>
                </span>
                <span class="sr-only">
                    <svg viewBox="0 0 477.175 477.175">
                        <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                        c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z">
                        </path>
                    </svg>
                </span>
            </a>
            <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-grey-5 u-spacing-13 u-text-grey-40 u-carousel-control-2"
                href="#carousel-5989" role="button" data-u-slide="next">
                <span aria-hidden="true">
                    <svg viewBox="0 0 477.175 477.175">
                        <path
                            d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                    c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z">
                        </path>
                    </svg>
                </span>
                <span class="sr-only">
                    <svg viewBox="0 0 477.175 477.175">
                        <path
                            d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
            c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z">
                        </path>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>

<style>
    .testimonial-content-container {
        max-height: 200px;
        /* Adjust this value as needed */
        overflow-y: auto;
        /* Add vertical scroll if content exceeds the height */
    }
    .testimonial-content-container p{
        overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Set a fixed height for testimonial content container
        var testimonialContentContainers = document.querySelectorAll(".testimonial-content-container");
        testimonialContentContainers.forEach(function(container) {
            container.style.height = "200px"; // Adjust this value as needed
        });
    });
</script>
