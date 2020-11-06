<script>

    window.addEventListener('attachedToAction', event => { 

                toastr[event.detail.type](event.detail.message)
                toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                       
                    }
                    if(event.detail.type === 'success'){
                       
                        setTimeout(function() {
                            location.reload();
                        }, 5000);
                    
                    }
                })
             
 </script>