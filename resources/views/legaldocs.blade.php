@extends('layouts.master')






@section('content')
    @include('includes/page_header');


    <section class="gallery m-3">
        <div class="container">
            <div class="row">
                @foreach ($legaldocs as $legaldoc)
                    <div class="col-md-4 mb-3">
                        <a class="venobox" data-gall="myGallery" href="{{ asset($legaldoc->image) }}">
                            <img class="galpage_image" src="{{ asset($legaldoc->image) }}" alt="" />

                            <p class="galpage_title">{{ $legaldoc->title }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('venobox/dist/venobox.min.js') }}"></script>

    <script>
        new VenoBox({
            selector: '.venobox',
            numeration: true,
            infinigall: true,
            share: true,
            spinner: 'rotating-plane'
        });
    </script>
@endsection
