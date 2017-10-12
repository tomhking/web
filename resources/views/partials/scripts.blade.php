<script type="text/javascript">
    function jqWait(fn) {
        var handle = setInterval(function () {
            if(typeof window.jQuery !== 'undefined') {
                clearInterval(handle);
                fn();
            }
        }, 50);
    }

    jqWait(function () {
        var bootstrap = document.createElement('script');
        bootstrap.src = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js';
        bootstrap.async = true;
        document.body.appendChild(bootstrap);
    })
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" async defer></script>