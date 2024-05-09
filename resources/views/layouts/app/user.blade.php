
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.app.user_partial.head')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      {{-- <a href="/" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> --}}
      <!-- Uncomment below if you prefer to use text as a logo -->
       <h1 class="logo"><a href="/">Bimbel Samarinda</a></h1>

      @include('layouts.app.user_partial.nav')

    </div>
  </header><!-- End Header -->

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts.app.user_partial.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" id="back-top"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts.app.user_partial.script')

</body>

</html>
