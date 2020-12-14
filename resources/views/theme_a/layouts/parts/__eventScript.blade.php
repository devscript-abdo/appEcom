<script>
    /*Echo.channel('events')
        .listen('RealTimeMessage', (e) => console.log('RealTimeMessage: ' + e.message));*/

    Echo.private('App.Models.Admin.1')
        .notification((notification) => {
            console.log(notification.message);
            toastr['success'](notification.message)
            toastr.options = {
                "closeButton": true,
                "progressBar": true,

            }
        });
   /* Echo.private('events')
        .listen('RealTimeMessage', (e) => console.log('Private RealTimeMessage: ' + e.message));*/
</script>

<script>
    window.addEventListener('attachedToAction', event => {

        toastr[event.detail.type](event.detail.message)
        toastr.options = {
            "closeButton": true,
            "progressBar": true,

        }
        if (event.detail.type === 'success') {

            setTimeout(function () {
                location.reload();
            }, 5000);

        }
    })

</script>


