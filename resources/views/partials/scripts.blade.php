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
<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>

@if(env('OPTINMONSTER_ENABLED', true) && !auth()->check() && !in_array(request()->route()->getName(), ['login', 'register', 'password', 'password.request']))
    <script>var om980_13439,om980_13439_poll=function(){var r=0;return function(n,l){clearInterval(r),r=setInterval(n,l)}}();!function(e,t,n){if(e.getElementById(n)){om980_13439_poll(function(){if(window['om_loaded']){if(!om980_13439){om980_13439=new OptinMonsterApp();return om980_13439.init({"a":13439,"staging":0,"dev":0,"beta":0});}}},25);return;}var d=false,o=e.createElement(t);o.id=n,o.src="https://a.optnmstr.com/app/js/api.min.js",o.async=true,o.onload=o.onreadystatechange=function(){if(!d){if(!this.readyState||this.readyState==="loaded"||this.readyState==="complete"){try{d=om_loaded=true;om980_13439=new OptinMonsterApp();om980_13439.init({"a":13439,"staging":0,"dev":0,"beta":0});o.onload=o.onreadystatechange=null;}catch(t){}}}};(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(o)}(document,"script","omapi-script");</script><!-- / OptinMonster -->
@endif