{{--
  Template Name: Kontakt side
--}}

@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>Kontakt</h1>
  </div>
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
      <div class="col-12 col-md-4"></div>
    </div>
  </div>
  <div class="row contact-form">
    <div class="col-6 offset-3">
      @php echo do_shortcode($contact_form) @endphp
    </div>
  </div>
</div>


@endsection