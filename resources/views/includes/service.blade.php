
     <style>
        
.services_page_row {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  grid-gap: 30px;
}


.service_div {
  text-align: center;
  padding: 25px 10px;
  border-radius: 5px;
  font-size: 14px;
  cursor: pointer;
  background: transparent;
  transition: transform 0.5s, background 0.5s;
}

.service_div img {
  height: 50px;
  width: auto;
  margin-bottom: 10px;
 
}

.service_div h4 {
  font-weight: 600;
  margin-bottom: 8px;
  color: #2a5385;
}

.service_div p{
    color: #333;
}
.service_div:hover {
  background:#2a5385;
  color: #fff;
  transform: scale(1.05);
}

.service_div:hover h4 {
  color: #fff;
}

.service_div:hover p {
  color: #fff;
}

     </style>
     
    <div class="container"> 
     <div class="services_page_row">
        @foreach ($services as $service )
        <a href="{{ route('Servicesingle', $service->slug) }}">
        <div class="service_div">
            <img src="{{ asset($service->icon) }}" alt="serviceicon" />

          <h4>{{ $service->title }}</h4>
          <p>
            {{ Str::substr($service->description, 0, 200) }}...
          </p>
        </div>
    </a>       
        @endforeach
 
      </div>
    
    
    </div>
    
    {{-- <section class="u-clearfix u-section-2" id="sec-9786">
        <main class="main">
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
        </main>
    </section> --}}