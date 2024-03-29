@extends('layouts.master')

@section('content')
    @include('includes.page_header')

    <main class="main mb-3">
        <div class="container">
            <div class="row single">
                @foreach ($clients as $client)
                    <div class="col-md-4">
                        <div class="card">
                            <!-- Assuming your client model has an 'image' attribute -->
                            <img class="card__icon" src="{{ asset($client->image) }}" alt="client-logo">
                            <div class="card__body">
                                <h4 class="card__head">{{ $client->title }}</h4>
                                <p class="card__content">{{ $client->description }}</p>
                                <!-- Add more client details here as needed -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>


    @include('includes.contact')
@endsection
