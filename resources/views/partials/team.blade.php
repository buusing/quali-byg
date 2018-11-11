@foreach($get_team_sections as $index => $section)
  <div class="row align-items-center py-5 @if($index % 2 != 0) bg-background @else bg-grey-faded @endif">
    <div class="col-12 col-md-4 @if($index % 2 == 0) offset-md-2 @else order-12 @endif d-flex justify-content-center align-items-center px-5">
      <img class="img-fluid" src="{{ $section['image']['url'] }}">
    </div>

    <div class="col-12 col-md-4 @if($index % 2 != 0) offset-md-2 @endif">
      {!! $section['text'] !!}
    </div>
  </div>
@endforeach