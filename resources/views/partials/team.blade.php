@php $counter = 0 @endphp
@foreach($get_team_sections as $section)
  <div class="row align-items-center py-5 @if($counter % 2 != 0) flex-row-reverse bg-background @endif">
    <div class="col-12 col-md-6 px-5 d-flex justify-content-center">
      <img class="img-fluid" src="{{ $section['image']['url'] }}">
    </div>
    <div class="col-12 col-md-6 px-5">
      {!! $section['text'] !!}
    </div>
  </div>
  @php $counter ++ @endphp
@endforeach
<div class="row">
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