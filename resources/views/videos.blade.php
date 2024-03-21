@extends('layouts.master')






@section('content')
@include('includes/page_header');


<section class="gallery m-3">
    <div class="container">
        <div class="row">
            @foreach ($videos as $video)
            <div class="col-md-4 mb-3">  
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $video->url }}" title="{{ $video->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
            @endforeach
        </div>
    </div>
</section>






@endsection