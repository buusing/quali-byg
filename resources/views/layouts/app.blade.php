<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  @if( !is_page('team') )
    @php($class = 'bg-grey-faded')
  @else
    @php($class = 'bg-white')
  @endif
  <body @php body_class($class) @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap container-fluid" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
