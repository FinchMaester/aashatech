



<section class="insta-embed">
    <div class="container">
        <div class="row">
            @foreach ($instagramPosts as $insta)
       
            <div class="col-md-4">
                <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="{{ $insta->link }}" data-instgrm-version="14"></blockquote>
                    <script async src="//www.instagram.com/embed.js"></script>
            </div>
                     
            @endforeach
    </div>
</section>