@extends('theme_a.layouts.app')

@section('content')

   {{-- @include('theme_a.admins.__top')--}}
    {{--@include('theme_a.leads._livewire.__section_a')--}}
    @include('theme_a.leads._livewire.__section_b')
    @include('theme_a.leads._livewire.__section_c')
@endsection

@push('styles')

    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">

@endpush

@push('scripts')
   <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>
   <script src="{{asset('assets/js/table/datatable.js')}}"></script>
@endpush