{{--
  Template Name: Kontakt side
--}}

@extends('layouts.app')
@section('content')
  @include('partials.page-header')
  <div class="container">
    <div class="row py-5 border-top">
      <div class="col-12 col-md-8 d-flex flex-column flex-lg-row align-items-lg-center no-padding">
        @if(has_post_thumbnail())
          <img class="img-fluid" src="{!! the_post_thumbnail_url() !!}" alt="">
        @endif
        <div class="pl-lg-5">
          <h3>Erik Damgaard</h3>
          <h3><i class="far fa-envelope"></i><a href="mailto:qb@quali-byg.dk">qb@quali-byg.dk</a></h3>
          <h3>Havrehøjvej 10 3751 Østermarie Bornholm</h3>
        </div>
      </div>
      <div class="col-12 col-md-4 google-map">
        {{ do_shortcode('[wpgmza id="1"]') }}
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