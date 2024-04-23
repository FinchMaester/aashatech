@extends('layouts.master')

@section('content')
    <section class="post_page">
        <div class="container">
            <div class="row mt-2 mb-3 ">
                <div class="col-md-9 col-lg-9">
                    @isset($post)
                        <h1 class="header_page_title">{{ $post->title }}</h1>
                        <div class="post-page-img">
                            <img src="{{ asset($post->image) }}"  alt="Post Image">
                        </div>
                        <span class="postpage_p">{!! $post->content !!}</span>
                    @endisset
                </div>
                <div class="col-md-3">
                    <div class="card-wel mb-3">
                        <h5 class="title_card">Other Posts</h5>
                        @foreach ($postslist as $list)
                            <a class="card-wel-title" href="{{ route('Post', $list->slug) }}">
                                <li>{{ $list->title }}</li>
                            </a>
                        @endforeach
                    </div>
                    <div class="card-wel">
                        <h5 class="title_card">Other Categories</h5>
                        @foreach ($categories as $category)
                            <a class="card-wel-title" href="{{ route('Post', $category->slug) }}">
                                <li>{{ $category->title }}</li>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes/productone')
    @include('includes/project')
    @include('includes/producttwo')
    @include('includes/clientlist')
    @include('includes/contact')
@endsection
