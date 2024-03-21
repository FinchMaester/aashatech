@foreach ($otherone as $otherone )

        <section class="u-clearfix u-grey-10 u-section-4" id="carousel_a2bd">
            <div class="u-custom-color-2 u-preserve-proportions u-shape u-shape-circle u-shape-1"
                data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Down"
                data-animation-delay="500"></div>
            <div class="u-custom-color-2 u-expanded-width u-shape u-shape-rectangle u-shape-2"
                data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Right"></div>
            <img src="{{ asset('uploads/welcome/' . $otherone->image) }}" alt="Other Service One" class="u-align-left u-image u-image-1" data-image-width="1100" 
            data-image-height="733" data-animation-name="fadeIn" data-animation-duration="1000"
                data-animation-direction="Left" data-animation-delay="500">
            <div class="u-align-left u-container-style u-group u-white u-group-1" data-animation-name="fadeIn"
                data-animation-duration="1000" data-animation-direction="Up" data-animation-delay="750">
                <div class="u-container-layout u-valign-top u-container-layout-1">
                    <h2 class="u-text u-text-custom-color-1 u-text-1">{{ $otherone->title }}</h2>
                    <p class="u-text u-text-2">
                        {{Str::substr($otherone->description,0,350) }}...
                    </p>
                    <a href="{{ route('Welcome', $otherone->slug) }}"
                        class="u-active-custom-color-2 u-border-none u-btn u-btn-round u-button-style u-color-scheme-summer-time u-color-style-multicolor-1 u-custom-color-1 u-hover-custom-color-2 u-radius-50 u-text-active-white u-text-body-alt-color u-text-hover-white u-btn-1">
                        learn more
                    </a>
                </div>
            </div>
        </section>

            
@endforeach