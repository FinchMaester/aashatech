@extends('layouts.master')

@section('content')
    @include('includes/page_header')

    <section class="about_page">
        <div class="container">

            <div class="row">
                <div class="col-md-5 p-0 col-lg-5 col-sm-12">
                    <img class="about_page_img img-fluid" src="{{ asset('uploads/about/' . $about->image) }}" alt="About Us">
                </div>
               
                    <div class="col-md-7 col-lg-7 col-sm-12">
                        <!-- About Us Content -->
                        {!! $about->content !!}
                    </div>
            </div>
    </section>


    <section class="mvcs">
        <div class="container">
            <div class="row">
                @foreach ($mvcs as $mvc)
                    <div class="col-md-4">
                        <h5 class="mvc_title text-center">{{ $mvc->title }}</h5>

                        <p class="mvc_description">{{ $mvc->description }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    @include('includes/teams');
    @include('includes/advisor');

    {{--
    @include('includes/count'); --}}
    @include('includes/contact');
    @include('includes/blogs');
@endsection
