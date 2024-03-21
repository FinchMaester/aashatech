@extends('layouts.master')



@section('content')


<h1 class="header_page_title">{{ $message->title }}</h1>


    <section class="post_page">
        <div class="container">
            
           
                <div class="row mt-2 mb-3 ">
                        <div class="col-md-4">
                            {{-- <h3 class="page_title post_tit">{{ $service->title }}</h3> --}}

                            <img class="single_img" src="{{ asset('uploads/message/' . $message->image ?? '') }}">
                            
                        </div>
                        <div class="col-md-5">

                            <span class="postpage_p">{!! $message->description !!} </span>

                            {{-- <div class="card card-wel">

                                        @foreach ($categorieson as $category)
                                        <h5>{{ $category->title }}</h5>
                                            @foreach ($category->getPosts as $post)
                                                <a class="card-post" href="/postview/{{ $post->id }}">Study In {{ $post->title }}
                                                        </li></a> <br>
                                            @endforeach
                                        @endforeach
                                    
                                        @foreach ($welcomes as $welcome )
                                        <a class="card-post" href="/welcome/{{ $welcome->id }}">{{ $welcome->title }}
                                        </li></a> 
                                        @endforeach
                                
                            </div> --}}
    
                        </div>



                        <div class="col-md-3">
                          <div class="card-wel">

                                        @foreach ($services as $servicelist )
                                        <a class="card-wel-title" href="/servicesingle/{{ $servicelist->id }}"><li>{{ $servicelist->title }}
                                        </li></a> 
                                        @endforeach
                                
                            </div> 
                        </div>
                   
     

                    
                </div>
    
        </div>
    </section>

   

@endsection
