@extends('layouts.master')



@section('content')
    <section class="service_page">
        <div class="container">
            <div class="row">

                @foreach ($messages as $message)


               
                    <h1 class="header_page_title">{{ $message->title }}</h1>
             

                <div class="col-md-5 servpage_img_col">
                   
                    <img class="md_image" src="{{ asset('uploads/message/' . $message->image) }}" alt="Chairman Image" />
                </div>
                <div class="col-md-7">

                    <p class="servpage_p">{!! $message->description !!}</p>
                    <hr>
                </div>

                
                @endforeach
            </div>

        </div>
    </section>
@endsection
