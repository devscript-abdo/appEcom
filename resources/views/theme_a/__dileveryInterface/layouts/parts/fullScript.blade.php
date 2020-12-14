<livewire:scripts />
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('assets/bundles/lib.vendor.bundle.js')}}"></script>

@stack('scripts')
<script src="{{asset('assets/js/core.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@include('theme_a.__dileveryInterface.layouts.parts.__eventScript')
<!----powered by Elmarzougui Abdelghafour at HaymacProduction----->
