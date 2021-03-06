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
            <a href="tel:+4540357757"><i class="fas fa-phone"></i></a>
            <p class="mb-0">Erik Damgaard</p>
            <p>4035 7757</p>
          </div>
          <div class="d-flex flex-column text-center">
            <a><i class="fas fa-map-marker-alt"></i></a>
            <p class="mb-0">Havrehøjvej 10</p> 
            <p class="mb-0">3751 Østermarie</p>
            <p>Bornholm</p>
          </div>
          <div class="d-flex flex-column text-center">
            <a href="mailto:qb@quali-byg.dk"><i class="far fa-envelope"></i></a>
            <a href="mailto:qb@quali-byg.dk">qb@quali-byg.dk</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 google-map">
        <div id="map">
          
        </div>
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