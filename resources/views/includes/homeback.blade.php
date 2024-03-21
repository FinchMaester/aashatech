<div class="u-expanded-width u-gallery u-layout-grid u-lightbox u-no-transition u-show-text-on-hover u-gallery-2"
id="carousel-062a">
<div class="u-gallery-inner u-gallery-inner-2" role="listbox">
    @foreach ($backimages as $backimage)
    @if (!empty($backimage->img) && is_array($backimage->img))
        <div
            class="u-effect-fade u-effect-hover-zoom u-gallery-item u-shape-rectangle u-gallery-item-3">
            <div class="u-back-slide" data-image-width="306" data-image-height="165">
                <img class="u-back-image u-expanded"
                    src="{{ asset( $backimage->img[0]) }}">
            </div>
            <div class="u-align-center-xs u-over-slide u-over-slide-3">
                <h3 class="u-gallery-heading text-white">{{ $backimage->title }}</h3>
                <p class="u-gallery-text text-white">{{ $backimage->img_desc }}</p>
            </div>
        </div>
        @endif
    @endforeach
</div>
</div>
