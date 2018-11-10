{{--
  Template Name: Gallery Template
--}}
@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="row">
    @php
      $portfolio_query = new WP_Query(array(
        'post_type' => 'portfolie',
      ));
    @endphp
    @if($portfolio_query->have_posts())
      @while($portfolio_query->have_posts()) @php $portfolio_query->the_post() @endphp
        <div class="col-12 col-md-6 col-lg-4 portfolie-wrapper relative" data-id="{{ get_the_ID() }}">
          @if(has_post_thumbnail())
            <div class="title">
              <h3>{{ the_title() }}</h3>
            </div>
            <img class="img-fluid d-block mx-auto" src="{{ the_post_thumbnail_url() }}">
          @endif
        </div>
      @endwhile
      @php wp_reset_query() @endphp
    @endif
  </div>
  <div class="row gallery-container">
    
  </div>
  <div class="row contact-form">
    <div class="col-12 col-md-6 offset-md-3 text-center">
      <h3 class="h2">Fangede vi din interesse</h3>
      <p>Send os en forespørsmål med dine ønsker og behov, så vender vi snarest tilbage til dig.</p>
    </div>
    <div class="col-12 col-md-4 offset-md-4">
      @php echo do_shortcode($contact_form) @endphp
    </div>
  </div>
@endsection