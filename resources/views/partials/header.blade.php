<div class="top-nav d-flex justify-content-between px-5">
  <a href="mailto:qb@quali-byg.dk"><i class="far fa-envelope" style="margin-right: 10px"></i>qb@quali-byg.dk</a>
  <p><i class="fas fa-phone fa-rotate-90" style="margin-right: 10px"></i>Man-Frekl.09.00-15.30</p>
  <p><a href="https://facebook.com"><i class="fab fa-facebook"></i></a><a href="https://facebook.com"><i class="fab fa-instagram"></i></a></p>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="brand mr-auto" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu($primarymenu) !!}
      @endif
    </div>
  </div>
</nav>
