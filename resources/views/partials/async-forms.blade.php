<script type="text/javascript">
    jqWait(function () {
        $("form.async-validated").submit(function (e) {
            var form = $(this), inputs = $("input,select,button", form), formData = $(this).serialize();
            e.preventDefault();

            inputs.attr("disabled", "disabled");
            $('.has-error', form).removeClass('has-error');
            $('.validation-error', form).text('');
            $('.other-error').hide();

            $.post(form.attr('action'), formData).then(function (e) {
                if(form.attr('data-redirect')) {
                    location.href = form.attr('data-redirect');
                } else if(form.attr('data-show')) {
                    $(form.attr('data-show')).fadeIn();
                    form.hide();
                } else {
                    location.reload();
                }
            }).catch(function (response) {
                if(response.status === 422) {
                    Object.keys(response.responseJSON).forEach(function(key) {
                        var field = $('.validation-'+key, form);
                        field.addClass('has-error');
                        $('.validation-error', field).text(response.responseJSON[key].join(' '));
                    });
                } else{
                    $('.other-error').show();
                }

                if(typeof grecaptcha !== 'undefined') {
                    grecaptcha.reset();
                }

                inputs.removeAttr('disabled');
            });
        })
    });
</script>