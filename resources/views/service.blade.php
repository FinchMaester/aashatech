@extends('layouts.master')



@section('content')
    @include('includes/page_header')



    @include('includes/service')



    {{-- <main class="main mb-3">
        <div class="container">
        
            <div class="cards-grid">
                @foreach ($services as $service)
                    <div class="card">
                        <img class="card__icon" src="{{ asset('uploads/service/' . $service->image) }}" alt="ux-design">
                        <div class="card__body">
                            <h4 class="card__head">{{ $service->title }}</h4>
                            <p class="card__content">{{ Str::substr($service->description, 0, 150) }}</p>
                            <a href="/servicesingle/{{ $service->id }}" class="about_btn btn-all">learn
                                more <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </main> --}}


    {{-- <section class="service_page">
        <div class="container">
            <div class="row">

                @foreach ($services as $service)
                <div class="col-md-6 row">
                <h3 class="page_title serv_tit">{{ $service->title }}</h3>
                <div class="col-md-4 servpage_img_col">
                   
                    <img class="servpage_img" src="{{ asset('uploads/service/' . $service->image) }}">
                </div>
                <div class="col-md-8">
                    <p class="servpage_p"> {!! $service->content !!} <span id="dots">...</span><span id="more"></p>
                    <button onclick="myFunction()" id="myBtn">Read more</button>
                    <hr>
                </div>
            </div>
                
                @endforeach
            </div>

        </div>
    </section> --}}
@endsection
{{-- 
<script>
    function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
</script> --}}
