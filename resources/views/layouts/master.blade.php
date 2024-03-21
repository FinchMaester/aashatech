<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php

@endphp



@include('includes.head')

<body data-home-page-title="Home" class="u-body u-xl-mode">

    {{-- @include('includes.topnav') --}}

    @include('includes.topnav')
    @include('includes.navbar')


    @yield('content')


    @include('includes.footer')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
