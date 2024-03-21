@extends('layouts.master')


@section('content')



@include('includes/page_header');

<section class="testimonial_page" id="sec-d6f6">
    <div class="container">
      
      <div class="row">
       

          @foreach ($testimonials as $testimonial )
              
          
          <div class="col-md-3">
            <div class="u-container-layout u-similar-container u-container-layout-1">
              <div alt="" class="" src="" data-image-width="256" data-image-height="256">
                <img class="testimonial_section_img" src="{{ asset('uploads/testimonial/'. $testimonial->image) }}">
              </div>
              <p class="testimonial_para">{!! strip_tags($testimonial->content) !!}</p>
              <h5 class="testimonial_name">{{ $testimonial->title }}</h5>
            </div>
          </div>
          
          @endforeach  

       
      </div>
    </div>
  </section>
@endsection
