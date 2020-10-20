@extends('theme_a.layouts.app')

@section('content')

   {{-- @include('theme_a.admins.__top')--}}
    @include('theme_a.admins.__section_a')
    @include('theme_a.admins.__section_b')

@endsection

@push('scripts')
<script src="{{asset('assets/bundles/sweetalert.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/page/sweetalert.js')}}"></script>
<script>
    $(function() {
        "use strict";
        
        $('.dropify').dropify();
    
        var drEvent = $('#dropify-event').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
    
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
    
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });
    });
</script>

<script>
    let input = document.getElementById('password');
    function generatePassword(){
        let randomstring = Math.random().toString(36).slice(-8);
        return input.value = randomstring;
    }

</script>
<script>
    let selected = document.getElementById('list-tab');
    let list = document.getElementById('addnew');
    console.log(selected);
    selected.addEventListener("click",function(){
        list.classList.remove('show');
        list.classList.remove('active');
        console.log('Yees');
    });
  
</script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
@endpush