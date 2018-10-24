@foreach($get_team_sections as $index => $section)
  <div class="row align-items-center py-5 @if($index % 2 != 0) flex-row-reverse bg-background @endif">
    <div class="col-12 col-md-6 px-5 d-flex justify-content-center">
      <img class="img-fluid" src="{{ $section['image']['url'] }}">
    </div>
    <div class="col-12 col-md-6 px-5">
      {!! $section['text'] !!}
    </div>
  </div>
@endforeach