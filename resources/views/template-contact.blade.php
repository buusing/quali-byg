{{--
  Template Name: Kontakt side
--}}

@extends('layouts.app')
@section('content')
  <div class="py-5">
    @include('partials.page-header')
  </div>
  <div class="container">
    <div class="row py-5 border-top">
      <div class="col-12 col-md-4">
        @if(has_post_thumbnail())
          <img class="img-fluid" src="{!! the_post_thumbnail_url() !!}" alt="">
        @endif
      </div>
      <div class="col-12 col-md-4">
        <div>
          <div class="d-flex flex-column text-center">
            <p><i class="fas fa-phone"></i></p>
            <p class="mb-0">Erik Damgaard</p>
            <p>4037 7757</p>
          </div>
          <div class="d-flex flex-column text-center">
            <p><i class="fas fa-map-marker-alt"></i></p>
            <p class="mb-0">Havrehøjvej 10</p> 
            <p class="mb-0">3751 Østermarie</p>
            <p>Bornholm</p>
          </div>
          <div class="d-flex flex-column text-center">
            <p><i class="far fa-envelope"></i></p>
            <a href="mailto:qb@quali-byg.dk">qb@quali-byg.dk</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 google-map">
        @if($map = get_field('google_maps'))
          @php echo do_shortcode($map) @endphp
        @endif
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row contact-form">
      <div class="col-12 col-md-6 offset-md-3 text-center">
        <h3 class="h2">Ønsker du at vide mere?</h3>
        <p>Send os en forespørsmål med dine ønsker og behov, så vender vi snarest tilbage til dig.</p>
      </div>
      <div class="col-12 col-md-4 offset-md-4">
        @php echo do_shortcode($contact_form) @endphp
      </div>
    </div>
  </div>
</div>


@endsection