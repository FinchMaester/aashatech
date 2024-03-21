
        <section class="u-align-center u-clearfix u-section-5" id="carousel_b442">
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                <h2 class="u-text u-text-custom-color-1 u-text-default u-text-1">Our Projects</h2>
                <p class="u-text u-text-2">You're gonna need two hands to hold our twisted projects. Our fresh and woderful
                    projects
                    are served up quite well with all the ingredients needed to succeed.</p>
                <div class="u-list u-list-1">
                    <div class="u-repeater u-repeater-1">

                        @foreach ($projects as $project)
                            <div class="u-align-right u-container-style u-image u-list-item u-repeater-item u-shading u-video-cover u-image-1"
                                data-image-width="1280" data-image-height="853"
                                style="background-image: url({{ asset('uploads/project/' . $project->image) }});">


                                <div class="u-container-layout u-similar-container u-container-layout-1">
                                    <div
                                        class="u-align-center u-black u-container-style u-group u-opacity u-opacity-35 u-video-cover u-group-1">
                                        <div
                                            class="u-container-layout u-valign-bottom-lg u-valign-bottom-md u-valign-bottom-xl u-container-layout-2">
                                            <h4 class="u-text u-text-3">{{ $project->title }}</h4>
                                            <a href="{{ route('Project', $project->slug) }}"
                                                class="u-active-custom-color-1 u-border-none u-btn u-btn-round u-button-style u-custom-color-2 u-hover-custom-color-1 u-radius-50 u-btn-1">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

