<div class="top-nav d-flex justify-content-between align-items-center py-3 px-2 px-lg-5">
  <a href="mailto:qb@quali-byg.dk"><i class="far fa-envelope" style="margin-right: 10px"></i>qb@quali-byg.dk</a>
  <a><i class="fas fa-phone fa-rotate-90" style="margin-right: 10px"></i>Man-Frekl.09.00-15.30</a>
  <div class="d-none d-lg-flex mb-0">
  	<a href="https://facebook.com" class="mr-2 facebook-logo"></a>
    <a href="https://facebook.com" class="mr-2 instagram-logo"></a>
  </div>
</div>
<nav class="navbar navbar-expand-lg @if(is_front_page()) frontpage @endif">
  <div class="container">
    <a class="brand mr-auto" href="{{ home_url('/') }}"><img class="logo" src="@asset('images/logo.png')"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu($primarymenu) !!}
      @endif
    </div>
  </div>
</nav>
