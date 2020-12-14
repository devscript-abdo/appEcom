<script>

    Echo.private('App.Models.Delivery.1')
        .notification((notification) => {
            console.log(notification.message);
            toastr['success'](notification.message)
            toastr.options = {
                "closeButton": true,
                "progressBar": true,

            }

                setTimeout(function () {
                    location.reload();
                }, 5000);

        });

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
    window.livewire.on('makeCommand', (event)  => {
        console.log(event);
    });

</script>
