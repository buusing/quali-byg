<div class="top-nav d-flex justify-content-between align-items-center py-3 px-2 px-lg-5">
  <a href="mailto:qb@quali-byg.dk"><i class="far fa-envelope" style="margin-right: 10px"></i>qb@quali-byg.dk</a>
  <a><i class="fas fa-phone fa-rotate-90" style="margin-right: 10px"></i>Man-Fre kl. 07.00-17.30</a>
  <div class="d-none d-lg-flex mb-0">
  	<a target="_blank" href="https://www.facebook.com/QualiByg-ApS-1394714237514815/" class="mr-2 facebook-logo"></a>
    <a target="_blank" href="https://www.instagram.com/qualibyg_aps/" class="mr-2 instagram-logo"></a>
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
