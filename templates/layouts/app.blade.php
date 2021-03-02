@include('partials.header')
{{-- @include('partials.nav') --}}

{{-- @if(is_user_logged_in())
    @include('partials.nav-user')
@endif --}}

@yield('content')
@yield('footer')

@include('partials.footer')
