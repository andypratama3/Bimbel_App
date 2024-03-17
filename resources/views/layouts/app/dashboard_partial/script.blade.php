 <!-- Vendor JS Files -->
 <script src="{{ asset('assets_dashboard/vendor/apexcharts/apexcharts.min.js')}}"></script>
 <script src="{{ asset('assets_dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{ asset('assets_dashboard/vendor/chart.js/chart.min.js')}}"></script>
 <script src="{{ asset('assets_dashboard/vendor/echarts/echarts.min.js')}}"></script>
 <script src="{{ asset('assets_dashboard/vendor/quill/quill.min.js')}}"></script>
 <script src="{{ asset('assets_dashboard/vendor/simple-datatables/simple-datatables.js')}}"></script>
 <script src="{{ asset('assets_dashboard/vendor/tinymce/tinymce.min.js')}}"></script>
 <script src="{{ asset('assets_dashboard/vendor/php-email-form/validate.js')}}"></script>
 <script src="{{ asset('assets_dashboard/js/SwetAlert/index.js') }}"></script>

 <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

 <!-- Template Main JS File -->
 <script src="{{ asset('assets_dashboard/js/main.js')}}"></script>
 @stack('js_dashboard')

<script>
    $(document).ready(function () {
        $('.card').on('click', '.delete', function () {
            let slug = $(this).data('id');
            swal({
                    title: 'Anda yakin?',
                    text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(`#delete-${slug}`).submit();
                    } else {
                        // Do Nothing
                    }
                });
        });
    });
</script>
