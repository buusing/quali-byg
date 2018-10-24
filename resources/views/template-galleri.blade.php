{{--
  Template Name: Gallery Template
--}}
@extends('layouts.app')

@section('content')
  <h1>{{ App::title() }}</h1>
  <div class="row">
    @php
      $portfolio_query = new WP_Query(array(
        'post_type' => 'portfolie',
      ));
    @endphp
    @if($portfolio_query->have_posts())
      @while($portfolio_query->have_posts()) @php $portfolio_query->the_post() @endphp
        <div class="col-12 col-md-4 portfolie" data-id="{{ get_the_ID() }}">
          @if(has_post_thumbnail())
            <h3>{{ the_title() }}</h3>
            <img class="img-fluid" src="{{ the_post_thumbnail_url() }}">
          @endif
        </div>
      @endwhile
      @php wp_reset_query() @endphp
    @endif
  </div>
  <div class="row gallery-container">
    
  </div>
@endsection