@extends('layouts.master')

@section('content')

    @include('includes/page_header')

    <main class="main mb-3">
        <div class="container">
            <div class="row single">
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card__icon" src="{{ asset($post->image) }}" alt="post-image">
                            <div class="card__body">
                                <h4 class="card__head">{{ $post->title }}</h4>
                                <p class="card__content">{!! htmlspecialchars(strip_tags(Str::substr($post->content, 0, 200))) !!}...</p>
                                <a href="{{ route('Post', $post->slug) }}" class="about_btn btn-all">
                                    Learn more <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    {{-- @include('includes/clientlist') --}}
    {{-- @include('includes/contact') --}}
    {{-- @include('includes/blogs') --}}

@endsection
