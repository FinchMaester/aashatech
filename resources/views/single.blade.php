@extends('layouts.master')

@section('content')
    <section class="header_page">
        {{-- <h1 class="header_page_title">{{ $category->title }}</h1> --}}
    </section>

    <main class="main mb-3">

        <div class="container">

            <div class="row single">


                @foreach ($posts as $post)
                    <div class=" col-md-4">
                        <div class="card">
                            <img class="card__icon" src="{{ asset($post->image) }}" alt="ux-design">
                            <div class="card__body">
                                <h4 class="card__head">{{ $post->title }}</h4>
                                <p class="card__content">{{ Str::substr($post->description, 0, 250) }}...</p>
                                <a href="/postview/{{ $post->slug }}" class="about_btn btn-all">
                                    learn more
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </main>




    @include('includes/productone')
    @include('includes/project');
    @include('includes/producttwo');
    @include('includes/clientlist');
    @include('includes/contact');
@endsection
