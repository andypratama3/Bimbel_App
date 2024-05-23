
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets_dashboard/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets_dashboard/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets_dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_dashboard/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_dashboard/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets_dashboard/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">Bimbel Samarinda</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                  </div>
                  @include('layouts.flashmessage')
                  <form action="{{ route('login') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                      <div class="invalid-feedback">Please enter a valid password adddress!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                      <a href="{{ route('register') }}" class="btn btn-danger w-100 mt-2" type="submit">Register</a>

                    </div>

                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets_dashboard/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets_dashboard/vendor/php-email-form/validate.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets_dashboard/js/main.js') }}"></script>

</body>

</html>
