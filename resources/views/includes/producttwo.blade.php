
    @foreach ($othertwo as $othertwo )

    <section class="u-clearfix u-section-7" id="carousel_4d72">
        <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-xl u-sheet-1">
            <div class="u-custom-color-2 u-shape u-shape-circle u-shape-1" data-animation-name=""
                data-animation-duration="0" data-animation-direction=""></div>
            <div class="u-align-left u-container-style u-expanded-width-xs u-grey-10 u-group u-group-1"
                data-animation-name="customAnimationIn" data-animation-duration="1000" data-animation-direction="">
                <div class="u-container-layout u-valign-top u-container-layout-1">
                    <h2 class="u-text u-text-custom-color-1 u-text-1">{{ $othertwo->title }}</h2>
                    <p class="u-text u-text-2">{{ Str::substr($othertwo->description,0,300) }}...</p>
                    <a href="{{ route('Welcome', $othertwo->slug) }}"
                        class="u-active-custom-color-1 u-border-none u-btn u-btn-round u-button-style u-color-scheme-summer-time u-color-style-multicolor-1 u-custom-color-2 u-hover-custom-color-1 u-radius-50 u-text-active-white u-text-body-alt-color u-text-hover-white u-btn-1">Learn
                        more</a>
                </div>
            </div>

            <div class="u-shape u-shape-svg u-text-custom-color-2 u-shape-2" data-animation-name="pulse"
                data-animation-duration="1000" data-animation-direction="">
                <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 160" style="">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-db78"></use>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                    xml:space="preserve" class="u-svg-content" viewBox="0 0 160 160" x="0px" y="0px"
                    id="svg-db78">
                    <path
                        d="M114.3,152.3l38-38C144.4,130.9,130.9,144.4,114.3,152.3z M117.1,9.1l-108,108c0.8,1.6,1.7,3.2,2.7,4.8l110-110
                        C120.3,10.9,118.7,10,117.1,9.1z M97.5,2L2,97.5c0.4,2,1,4,1.5,5.9l99.9-99.9C101.5,2.9,99.5,2.4,97.5,2z M80,160c2,0,4-0.1,5.9-0.2
                        l73.9-73.9c0.1-2,0.2-3.9,0.2-5.9c0-0.6,0-1.2,0-1.9L78.1,160C78.8,160,79.4,160,80,160z M34.9,146.1c1.5,1,3,2,4.6,2.9L149,39.5
                        c-0.9-1.6-1.9-3.1-2.9-4.6L34.9,146.1z M132.7,19.8L19.8,132.7c1.2,1.3,2.3,2.6,3.6,3.9L136.6,23.4C135.3,22.2,134,21,132.7,19.8z
                        M59.6,157.4l97.8-97.8c-0.5-1.9-1.1-3.8-1.7-5.7L53.9,155.6C55.8,156.3,57.7,156.9,59.6,157.4z M7.6,45.9L45.9,7.6
                        C29.1,15.5,15.5,29.1,7.6,45.9z M80,0c-2.6,0-5.1,0.1-7.6,0.4l-72,72C0.1,74.9,0,77.4,0,80c0,0.1,0,0.2,0,0.2L80.2,0
                        C80.2,0,80.1,0,80,0z">
                    </path>
                </svg>
            </div>

            <div class="u-image u-image-circle u-image-1" data-image-width="1280" data-image-height="853" data-animation-name="pulse" data-animation-duration="1000" data-animation-direction=""
                style="background-image: url('{{ asset('uploads/welcome/' . $othertwo->image)}}')">
            </div>
            <div class="u-border-7 u-border-white u-image u-image-circle u-image-2" data-image-width="1280"
                data-image-height="853" data-animation-name="pulse" data-animation-duration="1000"
                data-animation-direction=""
                style="background-image:url({{ asset('images/a17573651825e17a94e98712507310abaa54dbd603cb9658f950162f10f239cdaa9806c81b020fc70686ae2e8aed4199a94ee230d692721ea235fa_1280.jpg') }})">
            </div>

        </div>
    </section>

@endforeach



