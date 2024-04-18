@extends('layouts.master')

@section('content')
    <h1 class="header_page_title">{{ $project->title }}</h1>

    <section class="post_page">
        <div class="container">
            <div class="row mt-2 mb-3 ">
                <div class="col-md-9 col-lg-9">
                    {{-- <h3 class="page_title post_tit">{{ $service->title }}</h3> --}}
                    @foreach ($post as $item)
                        <img class="single_img" src="{{ asset($item->image) }}">
                    @endforeach

                    <span class="postpage_p">{!! $project->content !!} </span>
                </div>

                <div class="col-md-3">
                    <div class="card-wel mb-3">
                        <h5 class="title_card">Other Projects</h5>
                        @foreach ($projects as $projectlist)
                            <a class="card-wel-title" href="{{ route('Project', $projectlist->slug) }}">
                                <li>{{ $projectlist->title }}</li>
                            </a>
                        @endforeach
                    </div>

                    <div class="card-wel">
                        <h5 class="title_card">Categories</h5>
                        @foreach ($categories as $category)
                            <a class="card-wel-title" href="{{ route('Project', $projectlist->slug) }}">
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
