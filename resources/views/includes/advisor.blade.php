<section class="u-clearfix u-section-9" id="sec-1d26">
    <div
        class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <h2 class="u-text u-text-custom-color-1 u-text-default u-text-1">Our Advisors</h2>
        <div class="u-expanded-width u-list u-list-1">
            <div class="u-repeater u-repeater-1">
                @foreach ($advisors as $advisor )

                <div class="u-align-center-lg u-align-center-xl u-container-style u-list-item u-repeater-item">
                    <div
                        class="u-container-layout u-similar-container u-valign-top-lg u-valign-top-md u-valign-top-xl u-container-layout-1">
                        <div alt="" class="u-image u-image-circle u-image-1" src=""
                            data-image-width="500" data-image-height="500" style="background-image: url('{{ asset('uploads/advisor/' . $advisor->image)}}')"></div>
                        <h5
                            class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-custom-color-1 u-text-2">
                            {{ $advisor->name }}</h5>
                        <p
                            class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-3">
                            {{ $advisor->company }}</p>
                    </div>
                </div>
               
                                           
                @endforeach
            </div>
        </div>
    </div>
</section>