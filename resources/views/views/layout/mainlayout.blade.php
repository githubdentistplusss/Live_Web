<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('views.layout.partials.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
@if (Route::is(['map-grid']))

    <body class="map-page">
@endif
@if (Route::is(['chat-doctor', 'chat']))

    <body class="chat-page">
@endif
@if (Route::is(['doctor-register', 'forgot-password', 'login', 'register']))

    <body class="account-page">
@endif
@if (Route::is(['video-call', 'voice-call']))

    <body class="call-page">
@endif
@include('views.layout.partials.header')
@yield('content')
@if (!Route::is(['chat-doctor', 'map-grid', 'map-list', 'chat', 'voice-call', 'video-call']))
    @include('views.layout.partials.footer')
@endif
@include('views.layout.partials.footer-scripts')

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
                url: "{{ asset('/language') }}",
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
@yield('script')
</body>

</html>
