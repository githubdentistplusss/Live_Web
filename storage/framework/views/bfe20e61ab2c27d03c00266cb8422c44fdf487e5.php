<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <?php echo $__env->make('views.layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

</head>
<?php if(Route::is(['map-grid'])): ?>

    <body class="map-page">
<?php endif; ?>
<?php if(Route::is(['chat-doctor', 'chat'])): ?>

    <body class="chat-page">
<?php endif; ?>
<?php if(Route::is(['doctor-register', 'forgot-password', 'login', 'register'])): ?>

    <body class="account-page">
<?php endif; ?>
<?php if(Route::is(['video-call', 'voice-call'])): ?>

    <body class="call-page">
<?php endif; ?>
<?php echo $__env->make('views.layout.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php if(!Route::is(['chat-doctor', 'map-grid', 'map-list', 'chat', 'voice-call', 'video-call'])): ?>
    <?php echo $__env->make('views.layout.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('views.layout.partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        // alert(1);
        /*$('.submenu li a').click(function(){
          $(.submenu li a).removeClass("active");
          $(this).addClass("active");
          $('.has-submenu a').removeClass("active");
          $('.has-submenu a').addClass("active");
          
          //$(this).toggleClass("active");
        });*/
        $('#datetimepickerDate1').datetimepicker({

            format: 'Y-M-D'

        });
        $('#langSwitch').change(function() {
            var locale = $(this).val();
            //	alert(locale);
            var _token = $('input[name=_token]').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                type: 'POST',
                url: "<?php echo e(asset('/language')); ?>",
                data: {
                    _token: _token,
                    locale: locale
                },
                success: function(response) {

                    window.location.reload(true);
                },
                error: function(error) {
                    alert(error);
                }

            });
            //$.post(url+'changeLanguage',{'local':local,'_token':_token},function (data) {
            //window.location.reload(true);
            //});

        });
    });

</script>
<?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH /home/dentist/public_html/resources/views/views/layout/mainlayout.blade.php ENDPATH**/ ?>