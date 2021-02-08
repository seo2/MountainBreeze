@if(have_posts())
    @while(have_posts())
        @php(the_post())
        @php(the_title())
        @php(the_content())
        {{ $slot }}
    @endwhile
@endif
