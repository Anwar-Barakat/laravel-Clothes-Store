<script src="{{ asset('front/assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
<script src="{{ asset('front/assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('front/assets/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.sticky.js') }}"></script>

@if (App::getLocale() == 'ar')
    <script src="{{ asset('front/assets/js/arabic-functions.js') }}"></script>
    <script>
        $('.master__image .icon.fa-chevron-left').on('click', function() {

            if ($('.thumnails .selected').is(':last-child'))
                $('.thumnails img').eq(0).click();
            else
                $('.thumnails .selected').next().click();
        });

        $('.master__image .icon.fa-chevron-right').on('click', function() {

            if ($('.thumnails .selected').is(':first-child'))
                $('.thumnails img:last').click();

            else
                $('.thumnails .selected').prev().click();
        });
    </script>
@else
    <script src="{{ asset('front/assets/js/functions.js') }}"></script>
    <script>
        $('.master__image .icon.fa-chevron-right').on('click', function() {

            if ($('.thumnails .selected').is(':last-child'))
                $('.thumnails img').eq(0).click();
            else
                $('.thumnails .selected').next().click();
        });

        $('.master__image .icon.fa-chevron-left').on('click', function() {

            if ($('.thumnails .selected').is(':first-child'))
                $('.thumnails img:last').click();

            else
                $('.thumnails .selected').prev().click();
        });
    </script>
@endif

<!-- Bootstrap Bundle js -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{-- toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('message'))
    <script>
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "60000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        var type = "{{ Session::get('alert-type', 'success') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
@endif



@yield('js')

<script>
    let btn = document.getElementById('allCats');
    let megaBox = document.getElementById('megaBox');
    btn.addEventListener('click', () => {
        megaBox.classList.toggle("active")
    });
</script>
