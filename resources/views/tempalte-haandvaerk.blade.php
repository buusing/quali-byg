{{--
  Template Name: Håndværk Template
--}}
@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>Vi udfører</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light no-padding">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarGenres" aria-controls="navBarGenres" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navBarGenres">
        <ul class="navbar-nav mr-auto">
          @php 
            $taxonomy = get_taxonomy('genre');
            $terms = get_terms($taxonomy->name); 
          @endphp
          @foreach($terms as $term)
            <li class="nav-item">
              <a href="#{{ str_replace('&amp;', 'og', strtolower(str_replace(' ', '-', $term->name))) }}" class="nav-link sub-menu-item">{!! $term->name !!}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </nav>
  </div>
  @php $number = 1; @endphp
  @foreach($terms as $term)
    @php $term_name = str_replace('&amp;', 'og', strtolower(str_replace(' ', '-', $term->name))) @endphp
    <div id="{{ $term_name }}" class="row @if($number % 2 == 0) flex-row-reverse @endif" style="background-color: {{ get_field('background_color', $term) }}">
      <div class="col-12 col-md-6 no-padding">
        @php $image = get_field('image', $term) @endphp
        <img class="img-fluid" src="{{ $image['url'] }}">
      </div>
      <div class="col-12 col-md-6 no-padding">
        <div class="pt-5 pb-2 px-5">
          <p class="h2">{!! $term->name !!}</p>
          <p>{{ $term->description }}</p>
          <a class="btn btn-primary expand-button mx-auto haandvaerk-button">Læs mere</a>
        </div>
      </div>
    </div>
    <div class="genres {!! $term_name !!} row"> <!-- Start of term query -->
      @php
        $term_query = new WP_Query(array(
          'post_type' => 'haandvaerk',
          'tax_query' => array(
            array(
              'taxonomy' => 'genre',
              'field' => 'id',
              'terms' => $term->term_id,
            )
          )
        ));
      @endphp
      @if($term_query->have_posts() )
        @while($term_query->have_posts() ) @php $term_query->the_post() @endphp
        <div class="d-flex @if($number % 2 == 0) flex-row-reverse @endif">
          <div class="col-12 col-md-6 no-padding d-flex align-items-center">
            @if( has_post_thumbnail() )
              <img src="{{ the_post_thumbnail_url() }}">
            @else
              <img class="img-fluid" src="{{$image['url']}}" alt="">
            @endif
          </div>
          <div class="col-12 col-md-6 no-padding">
            <div class="pt-5 pb-2 px-5">
              {{ the_content() }}
            </div>
          </div>
        </div>
        @endwhile
      @endif 
    </div> <!-- End of term query -->
    @php $number++ @endphp
  @endforeach
@endsection