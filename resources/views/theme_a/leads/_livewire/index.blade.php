@extends('theme_a.layouts.app')

@section('content')


    {{--@include('theme_a.leads._livewire.__section_b')--}}
    @include('theme_a.leads._livewire.__section_c')

@endsection

@push('styles')

<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">

@endpush

@push('scripts')
<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
   <script>

       function topFunction() {
            document.body.scrollTop = 0; // For Safari

            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

   </script>

@endpush
