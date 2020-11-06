@extends('theme_a.layouts.app')

@section('content')

   {{-- @include('theme_a.admins.__top')--}}
    @include('theme_a.todos._livewire.__section_a')
    @include('theme_a.todos._livewire.__section_b')

@endsection

@push('styles')

    {{--<link rel="stylesheet" href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
     --}}
     <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
@endpush

@push('scripts')
   {{--<script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>
   <script src="{{asset('assets/js/table/datatable.js')}}"></script>--}}
   <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
   <script>
       function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

   </script>

@endpush