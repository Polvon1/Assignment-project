<script src="{{ asset('landing/js/exam.app.js') }}"></script>
<!-- javascript -->
<script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
<!-- SLIDER -->
<script src="{{ asset('landing/js/tiny-slider.js') }}"></script>
<script src="{{ asset('landing/js/shuffle.min.js') }}"></script>
<!-- Icons -->
<script src="{{ asset('landing/js/feather.min.js') }}"></script>
<script src="{{ asset('landing/js/tobii.min.js') }}"></script>
@yield('vendor-script')
<!-- Main Js -->
{{--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.--}}
<script src="{{ asset('landing/js/plugins.init.js') }}"></script>
{{-- Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. --}}
<script src="{{ asset('landing/js/app.js') }}"></script>
<livewire:scripts />
@yield('page-script')
