<!DOCTYPE html>
<html>
<head>
    @include('partials.head')
</head>
<body>
  <form>
    <input type="hidden" id="theme_div" value="grey">
  </form>
    <?php if(auth()->check()):?>
      @include('partials.a-nav')
    <?php else:?>
      @include('partials.ua-nav')
    <?php endif;?>
  <div class="container">
      @yield('content')
  </div>
    @include('partials.foot')
</body>
</html>
