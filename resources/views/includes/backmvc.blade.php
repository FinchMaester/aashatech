<section class="u-align-center u-clearfix u-section-4" id="carousel_e650">
    <div class="u-clearfix u-sheet u-sheet-1">
        @foreach ($backimages as $backimage)
            <h2 class="u-text u-text-1">{{ $backimage->title }}</h2>


            <div class="u-clearfix u-gutter-30 u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-col">
                        <div class="u-size-30">
                            <div class="u-layout-row">
                                <div class="u-container-style u-image u-layout-cell u-right-cell u-size-60 u-image-1"
                                    data-image-width="1500" data-image-height="751">
                                    <img src="{{ asset('uploads/backimage/' . $backimage->image) }}"
                                        alt="Welcome Image">
                                    <div class="u-container-layout"></div>
                                </div>
                            </div>
                        </div>
        @endforeach
        <div class="u-size-30">
            <div class="u-layout-row">

                @foreach ($mvcs as $mvc)
                    <div class="u-container-style u-layout-cell u-size-20 u-layout-cell-2">
                        <div class="u-container-layout u-container-layout-2">
                            <h4 class="u-text u-text-3">{{ $mvc->title }}</h4>
                            <p class="u-align-justify u-text u-text-4">{{ $mvc->description }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>
