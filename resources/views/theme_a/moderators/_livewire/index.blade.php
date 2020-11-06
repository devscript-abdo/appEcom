@extends('theme_a.layouts.app')

@section('content')

   {{-- @include('theme_a.admins.__top')--}}
    @include('theme_a.moderators._livewire.__section_a')
    @include('theme_a.moderators._livewire.__section_b')

@endsection