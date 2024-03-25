@extends('layouts.master')



@section('content')


<h1 class="header_page_title">{{ $service->title }}</h1>


    <section class="post_page">
        <div class="container">

            <div class="row mt-2 mb-3 ">
                    <div class="col-md-9">
                        {{-- <h3 class="page_title post_tit">{{ $service->title }}</h3> --}}

                        <img class="single_img" src="{{ asset($service->image ?? '') }}" style="width: 150px; height: 150px;" alt="Service Image">
                       

                        <span class="postpage_p">{!! $service->content !!} </span>

                        
                    </div>

                    <div class="col-md-3">
                        <div class="card-wel">
                        <h5 class="title_card">Other Services</h5>
                            @foreach ($servicelist as $servicelist )
                                <a class="card-wel-title" href="{{ route('Servicesingle', $servicelist->slug) }}">
                                    <li>{{ $servicelist->title }}</li>
                                </a> 
                            @endforeach
                            
                        </div> 
                    </div>
                
            </div>
    
        </div>
    </section>


    @include('includes/productone');
    @include('includes/producttwo');

  @include('includes/project');        
    @include('includes/testimonials'); 

    @include('includes/clientlist');

    {{-- @include('includes/project');        
    @include('includes/testimonials');        
    @include('includes/producttwo');
    @include('includes/idea');
    @include('includes/advisor');
    @include('includes/clientlist'); --}}
    @include('includes/contact');
    @include('includes/blogs');
   

@endsection
