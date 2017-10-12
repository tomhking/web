<script type="text/javascript">
    function jqWait(fn) {
        var handle = setInterval(function () {
            if(typeof window.jQuery !== 'undefined') {
                clearInterval(handle);
                fn();
            }
        }, 50);
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" async defer></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" async defer></script>