@extends('layouts.master')



@section('content')
 
<h1 class="header_page_title">{{ $post->title }}</h1>


<section class="post_page">
    <div class="container">
        
       
            <div class="row mt-2 mb-3 ">
                    <div class="col-md-9 col-lg-9">
                        {{-- <h3 class="page_title post_tit">{{ $service->title }}</h3> --}}

                        <img class="single_img" src="{{ asset('uploads/post/' . $post->image ?? '') }}">
                        
                

                        <span class="postpage_p">{!! $post->content !!} </span>

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
                      <div class="card-wel mb-3">

                        <h5 class="title_card">Other Posts</h5>

                       
                                    @foreach ($postslist as $list )
                                    <a class="card-wel-title" href="{{ route('Post', $list->slug) }}"><li>{{ $list->title }}
                                    </li></a> 
                                    @endforeach
                            
                        </div> 

                      <div class="card-wel">

                        <h5 class="title_card">Other Categories</h5>

                       
                                    @foreach ($categories as $category )
                                    <a class="card-wel-title" href="{{ route('Category', $category->id) }}"><li>{{ $category->title }}
                                    </li></a> 
                                    @endforeach
                            
                        </div> 
                    </div>
               
 

                
            </div>

    </div>
</section>

@include('includes/productone')
@include('includes/project');                
@include('includes/producttwo');
@include('includes/clientlist');
@include('includes/contact');


@endsection
