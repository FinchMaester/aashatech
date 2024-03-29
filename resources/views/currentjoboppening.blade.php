@extends('layouts.master')
@section('content')
    @include('includes/page_header')

    <main class="main mb-3">
        <div class="container">
            <div class="row single">
                {{-- Check if there are any current openings --}}
                @if ($data->isEmpty())
                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert">
                            <strong>No Current Openings!</strong> There are currently no job openings available.
                        </div>
                    </div>
                @else
                    {{-- Loop through each job opening --}}
                    @foreach ($data as $item)
                        @if (now() < $item->deadline)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card__body">
                                        <h4 class="card__head">{{ $item->title }}</h4>
                                        <p class="card__content">{{ $item->description }}</p>
                                        <h6 class="card__head">Deadline: {{ $item->deadline }}</h6>
                                        <a href="{{ route('Jobs', ['id' => $item->id]) }}" class="about_btn btn-all">
                                            Apply
                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
