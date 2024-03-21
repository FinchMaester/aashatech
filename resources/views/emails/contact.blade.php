@component('mail::message')
    # Contact from {{ $name }}

    {{ $message }}

    @component('mail::button', ['url' => 'https://www.nseredu.com'])
        Visit Us
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
