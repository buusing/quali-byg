{{--
  Template Name: Håndværk Template
--}}
@extends('layouts.app')
@section('content')
  @include('partials.page-header')
  <div class="container-fluid no-padding">
    <nav class="navbar navbar-expand-lg navbar-light bg-light no-padding">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarGenres" aria-controls="navBarGenres" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
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
  <div class="container-fluid">
    @foreach($terms as $index => $term)
      @php $term_name = str_replace('&amp;', 'og', strtolower(str_replace(' ', '-', $term->name))) @endphp
      <div id="{{ $term_name }}" class="row @if($index % 2 == 0) flex-row-reverse @endif" style="background-color: {{ get_field('background_color', $term) }}">
        <div class="col-12 col-md-6 no-padding">
          @php $image = get_field('image', $term) @endphp
          <img class="img-fluid" src="{{ $image['url'] }}">
        </div>
        <div class="col-12 col-md-6 no-padding">
          <div class="pt-3 pt-md-5 pb-3 px-3 px-md-5">
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
            <div class="col-12" style="background-color: {{ get_field('background_color', $term) }}">
              <div class="row @if($index % 2 == 0) flex-row-reverse @endif">
                {{-- <div class="col-12 col-md-6 no-padding d-flex align-items-center genre-image" style="background-image: url({{ get_the_post_thumbnail_url() }});">
                </div> --}}
                <div class="col-12 col-md-6 no-padding d-flex align-items-center genre-image">
                  <img src="{{ get_the_post_thumbnail_url() }}">
                </div>
                <div class="col-12 col-md-6 no-padding">
                  <div class="pt-5 pb-2 px-5">
                    {{ the_content() }}
                    @if( ($term_query->current_post + 1) == ($term_query->post_count) )
                      <a class="btn btn-primary close-button mx-auto haandvaerk-button">Luk</a>
                    @endif
                  </div>
                </div>
              </div>  
            </div>
          @endwhile
          @php wp_reset_query() @endphp
        @endif 
      </div> <!-- End of term query -->
    @endforeach
    <div class="row contact-form">
      <div class="col-12 col-md-6 offset-md-3 text-center">
        <h3 class="h2">Er det os du søger?</h3>
        <p>Send os en forespørsmål med dine ønsker og behov, så vender vi snarest tilbage til dig.</p>
      </div>
      <div class="col-12 col-md-4 offset-md-4">
        @php echo do_shortcode($contact_form) @endphp
      </div>
    </div>
  </div>
@endsection