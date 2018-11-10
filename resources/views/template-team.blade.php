{{--
  Template Name: Team Template
--}}
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-8 col-offset-2">
      @if( have_posts())
        @while( have_posts() ) @php the_post() @endphp
          {{ the_content() }}
        @endwhile
      @endif
    </div>
  </div>
  <div class="row justify-content-center px-2 teamet">
    @php
      $query = new WP_Query( array(
        'post_type' => 'medarbejder',
      ));
    @endphp
    @if($query->have_posts())
      @while($query->have_posts()) @php $query->the_post() @endphp
        <div class="d-flex flex-column col-12 col-sm-6 col-lg-4">
          @if( has_post_thumbnail() )
            <img class="img-fluid" src="{{ the_post_thumbnail_url() }}">
          @endif
          <h3>{{ the_title() }}</h3>
          {{ the_content() }}
        </div>
      @endwhile
    @endif
  </div>
  @endsection
</div>