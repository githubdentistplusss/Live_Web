<script src={{ asset('assets/assets/js/jquery.min.js') }}></script>

<!-- Bootstrap Core JS -->
<script src={{ asset('assets/assets/js/popper.min.js') }}></script>
<script src={{ asset('assets/assets/plugins/bootstrap-rtl/js/bootstrap.min.js') }}></script>
<!-- Datetimepicker JS -->
<script src={{ asset('assets/assets/js/moment.min.js') }}></script>
<script src={{ asset('assets/assets/js/bootstrap-datetimepicker.min.js') }}></script>
<script src={{ asset('assets/assets/plugins/daterangepicker/daterangepicker.js') }}></script>
<!-- Full Calendar JS -->
<script src={{ asset('assets/assets/plugins/jquery-ui/jquery-ui.min.js') }}></script>
<script src={{ asset('assets/assets/plugins/fullcalendar/fullcalendar.min.js') }}></script>
<script src={{ asset('assets/assets/plugins/fullcalendar/jquery.fullcalendar.js') }}></script>
<!-- Sticky Sidebar JS -->
<script src={{ asset('assets/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}></script>
<script src={{ asset('assets/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}></script>
<!-- Select2 JS -->
<script src={{ asset('assets/assets/plugins/select2/js/select2.min.js') }}></script>
<!-- Fancybox JS -->
<script src={{ asset('assets/assets/plugins/fancybox/jquery.fancybox.min.js') }}></script>
<!-- Dropzone JS -->
<script src={{ asset('assets/assets/plugins/dropzone/dropzone.min.js') }}></script>

<!-- Bootstrap Tagsinput JS -->
<script src={{ asset('assets/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}></script>

<!-- Profile Settings JS -->
<script src={{ asset('assets/assets/js/profile-settings.js') }}></script>
<!-- Circle Progress JS -->
<script src={{ asset('assets/assets/js/circle-progress.min.js') }}></script>
<!-- Slick JS -->
<script src={{ asset('assets/assets/js/slick.js') }}></script>

<!-- Custom JS -->
<script src={{ asset('assets/assets/js/script.js') }}></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6V5DHXKVBQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6V5DHXKVBQ');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-182402133-1">
</script>

<!-- Google Ads  --> 
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-182402133-1');
  gtag('config', 'AW-703412079');
  gtag('config', 'AW-703412079/_EDtCKUFEO_utM8C', {
    'phone_conversion_number': '0580580373'
  });
</script>

@if (Route::is(['contactus', 'map-list']))
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBr8fHyX4CFO0PMq4dxJlhPH8RrjXfyN8"></script>
    <script src={{ asset('assets/assets/js/map.js') }}></script>
@endif
