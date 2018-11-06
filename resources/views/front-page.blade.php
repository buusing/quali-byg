@extends('layouts.app')
@section('content')
<div class="hero d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(255,255,255,0.15), rgba(255,255,255,0.15)), url({{ App::theFeaturedImage() }});">
  <div class="d-flex flex-column align-items-center">
    <h1 class="text-center">{{ $get_hero_text['text'] }}</h1>
    {{-- <h3>{{ $get_hero_text['subtext'] }}</h3> --}}
    <div class="d-flex">
      @foreach( $get_hero_buttons as $button)
        <a class="w-50 d-flex justify-content-center align-items-center text-center text-white btn" href="{{ $button['url']}}">{{ $button['text'] }}</a>
      @endforeach
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-8 offset-md-2 py-5">
    @if( have_posts() ) @php the_post() @endphp
      {{ the_content() }}
    @endif 
  </div>
  <div class="col-12">
    @if($image = get_field('stort_billede'))
      <img class="img-fluid" src="{{ $image['url'] }}">
    @endif
  </div>
</div>
@include('partials.team')
<div class="row">
  <div class="col-12 col-md-6 offset-md-3 text-center">
    <h2 class="py-5 font-thin">Hvad siger vores kunder</h2>
  </div>
  <div class="col-12 no-padding">
    @php
      $query = new WP_Query(array(
        'post_type' => 'anmeldelser',
      ));
    @endphp
    @if($query->have_posts())
      <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          @while( $query->have_posts() ) @php $query->the_post() @endphp
            <div class="swiper-slide d-flex justify-content-end align-items-center flex-wrap">
              @if( has_post_thumbnail() )
                <div class="slider-image" style="background-image: url({{ the_post_thumbnail_url() }});"></div>
                <div class="col-12 d-md-none">
                  <img class="img-fluid" src="{{ the_post_thumbnail_url() }}">
                </div>
              @endif
              <div class="col-12 col-md-6 slider-text mb-3 px-5 pr-md-5">
                {{ the_content() }}
                <p class="text-center">{{ the_title() }}</p>
              </div>
            </div>
          @endwhile
        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div><!-- End slider -->
    @endif
  </div>
</div>
<div class="row py-5">
</div>
<div class="row contact-form">
  <div class="col-12 col-md-6 offset-md-3 text-center">
    <h3 class="h2">Ønsker du at vide mere?</h3>
    <p>Send os en forespørsmål med dine ønsker og behov, så vender vi snarest tilbage til dig.</p>
  </div>
  <div class="col-12 col-md-4 offset-md-4">
    @php echo do_shortcode($contact_form) @endphp
  </div>
</div>

@endsection