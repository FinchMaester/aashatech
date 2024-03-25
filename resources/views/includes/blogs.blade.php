<section class="u-clearfix u-section-12" id="sec-7b68">
    <div class="u-clearfix u-sheet u-valign-bottom u-sheet-1">
        <h2 class="u-text u-text-custom-color-1 u-text-default u-text-1">Blogs</h2>
        <!--blog-->
        <!--blog_options_json-->
        <!--{"type":"Recent","source":"","tags":"","count":""}-->
        <!--/blog_options_json-->
        <div class="u-blog u-container-style u-expanded-width u-blog-1">
            <div class="u-list-control"></div>
            <div class="u-repeater u-repeater-1">

                @foreach ($posts as $post )
                    
             
                <!--blog_post-->
                <div class="u-blog-post u-container-style u-repeater-item">
                    <div class="u-container-layout u-similar-container u-container-layout-1">
                        <a class="u-post-header-link text-decoration-none" href="{{ route('Post', $post->slug) }}">
                            <!--blog_post_image-->
                            <img src="{{ asset($post->image) }}" alt=""
                                class="u-blog-control u-image u-image-default u-image-1">
                            <!--/blog_post_image-->
                        
                        <div
                            class="u-align-center-sm u-align-center-xs u-container-style u-expanded-width u-group u-white u-group-1">
                            <div class="u-container-layout u-container-layout-2">
                                <p class="u-text u-text-custom-color-1 u-text-2" href="{{ route('Post', $post->id) }}">{{ $post->title }}</p>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>

                @endforeach
                <!--/blog_post-->
            </div>
            <div class="u-list-control"></div>
        </div>
        <!--/blog-->
    </div>
</section>
