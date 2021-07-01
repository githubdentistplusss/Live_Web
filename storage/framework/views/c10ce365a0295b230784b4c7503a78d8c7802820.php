<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Dentist Pluss</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="description" content="description">
    <meta name="Sard" content="sard">
    <meta name="robots" content="index">
    <!-- ******* FavIcon ******* //-->
    <?php echo $__env->yieldContent('og_meta'); ?>


    <link rel="icon" href="<?php echo e(asset('assets/imgs/favicon.png?')); ?>" type="image/x-icon">
    <!-- ******* CSS File ******* //-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/card_style.css')); ?>">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css">
    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>


    <link rel="stylesheet" href="<?php echo e(asset('assets/css/dd.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/star-rating.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/theme.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

    <?php if( app()->getLocale()=='en'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/styleLtr.css')); ?>">
    <?php elseif( app()->getLocale()=='ar'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-rtl.min.css')); ?>">
    <?php endif; ?>
    <script type="text/javascript">
        function showfollowers() {
            //alert('fff');

            document.getElementById("followers").style.display = "block";

        }

        function hidefollowers() {
            //alert('fff');

            document.getElementById("followers").style.display = "none";

        }


    </script>
</head>
<body>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.4.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCf0cUT2pxGwdsHIolcFboDGGcLfR34UWY",
        authDomain: "free-dentist.firebaseapp.com",
        databaseURL: "https://free-dentist.firebaseio.com",
        projectId: "free-dentist",
        storageBucket: "",
        messagingSenderId: "870620690921",
        appId: "1:870620690921:web:67ebc7f79e20a6d0"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
</script>
<?php /*$fcm_key = "AIzaSyCf0cUT2pxGwdsHIolcFboDGGcLfR34UWY";
$body = array("data" => 'noha', "to" => "01124188178");

$body = json_encode($body);

 $json = request(env('FCM_URL'), $body, "POST", "Authorization: key=$fcm_key\r\nContent-Type:application/json");*/

?>
<header class="main-header">
    <div class="container">

        <!--navigation menu-->
        <nav class="navbar navbar-expand-lg navbar-light navbarRest"><a class="navbar-brand"
                                                                        href="<?php echo e(route('index')); ?>"><img
                        src="<?php echo e(url('assets/imgs/home/logo.png')); ?>" alt="Dentist Pluss"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">

                    <li class="nav-item active"><a href="<?php echo e(route('index')); ?>"><?php echo app('translator')->getFromJson('home.reserv'); ?></a></li>
                <!-- <li class="nav-item"><a href="#"><?php echo app('translator')->getFromJson('home.dentists'); ?></a></li>
              <li class="nav-item"><a href="#"><?php echo app('translator')->getFromJson('home.centers'); ?> </a></li>-->
                    <li class="nav-item"><a href="<?php echo e(route('aboutus')); ?>"> <?php echo app('translator')->getFromJson('home.about'); ?> </a></li>
                    <li class="nav-item"><a href="<?php echo e(route('contactus')); ?>"> <?php echo app('translator')->getFromJson('home.contact'); ?></a></li>
                    <li class="nav-item">
                        <!-- <a href="#" class="dropdown-togglex" data-toggle="dropdownx">
                             <div class="notifi"><i class="far fa-bell"> </i><span class="notifiNum count">

                </span></div>
                 </a>-->
                        <!-- <li class="dropdownx"><ul class="dropdown-menux"></ul>-->
                    <li class="dropdown" style="margin-right: 23px">
                        <a href="#" class="dropdownxx" data-toggle="dropdown">
                            <div class="notifi"><i class="far fa-bell">
                                    <div id="notfired" style="display: none">
                                    </div>
                                </i>
                            </div>
                        </a>
                        <ul class="dropdown-menu" id="notfy"></ul>
                    </li>
                    </li>
                    <?php if(isset(Auth::guard('dentist')->user()->id)): ?>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="navBtn dropdown-toggle" type="button" data-toggle="dropdown">
                                    <div class="pro-nav"><img
                                                src="<?php echo e(asset('assets/imgs/account/profileImg.png')); ?>">
                                    </div><?php echo e(Auth::guard('dentist')->user()->name); ?>

                                </button>
                                <div class="dropdown-menu">
                                <!-- <a class="dropdown-item" href="<?php echo e(route('upcommingReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.uDate'); ?></a>
                  <a class="dropdown-item" href="<?php echo e(route('upcommingAcceptedReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.uADate'); ?></a>
                  <a class="dropdown-item" href="<?php echo e(route('prevReservationD')); ?>"><?php echo app('translator')->getFromJson('resrv.pDate'); ?></a>
                  <a class="dropdown-item" href="<?php echo e(route('messages')); ?>"><?php echo app('translator')->getFromJson('resrv.msg'); ?> <?php echo $__env->make('messenger.unread-count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>-->
                                    <a class="dropdown-item"
                                       href="<?php echo e(route('dentistDashboard')); ?>"><?php echo app('translator')->getFromJson('login.account'); ?> </a>
                                    <a class="dropdown-item" href="<?php echo e(route('Dlogout')); ?>"><?php echo app('translator')->getFromJson('resrv.logout'); ?></a>
                                </div>
                            </div>
                        </li>
                    <?php elseif(isset(Auth::guard('client')->user()->id)): ?>

                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="navBtn dropdown-toggle" type="button" data-toggle="dropdown">
                                    <div class="pro-nav"><img
                                                src="<?php echo e(url('assets/imgs/account/profileImg.png')); ?>">
                                    </div><?php echo e(Auth::guard('client')->user()->name); ?>

                                </button>
                                <div class="dropdown-menu">
                                <!--<a class="dropdown-item" href="<?php echo e(route('UReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.uDate'); ?></a>
                    <a class="dropdown-item" href="<?php echo e(route('UAReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.uADate'); ?></a>
                  <a class="dropdown-item" href="<?php echo e(route('prevReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.pDate'); ?> </a>
                  <a class="dropdown-item" href="<?php echo e(route('messages')); ?>"><?php echo app('translator')->getFromJson('resrv.msg'); ?> <?php echo $__env->make('messenger.unread-count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a>-->
                                    <a class="dropdown-item"
                                       href="<?php echo e(route('clientDashboard')); ?>"><?php echo app('translator')->getFromJson('login.account'); ?> </a>
                                    <a class="dropdown-item" href="<?php echo e(route('Clogout')); ?>"><?php echo app('translator')->getFromJson('resrv.logout'); ?></a></div>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="navBtn dropdown-toggle" type="button" data-toggle="dropdown">
                                    <a class="navBtn" href="#"><?php echo app('translator')->getFromJson('login.login'); ?></a>
                                </button>
                                <div class="dropdown-menu"><a class="dropdown-item"
                                                              href="<?php echo e(route('dentistlogin')); ?>"><?php echo app('translator')->getFromJson('about.dentist'); ?></a><a
                                            class="dropdown-item"
                                            href="<?php echo e(route('clientlogin')); ?>"><?php echo app('translator')->getFromJson('about.patient'); ?></a></div>

                            </div>
            </div>
            </li>

        <?php endif; ?>




        <!--li.nav-item
              button.navBtn
                img(src="assets/imgs/home/user.svg")
                | تسجيل دخول
              -->
            </ul>
            <select class="form-control  loginInput" name="locale" id="langSwitch"
                    style="width:100px;margin-right:10px;color:#148bec">

                <option <?php if( app()->getLocale()=='ar'): ?> selected="selected" <?php endif; ?> value="ar">العربية</option>
                <option <?php if(app()->getLocale()=='en'): ?> selected="selected" <?php endif; ?>     value="en">English</option>
            </select>
    </div>
    </nav>
    <?php echo $__env->make('frontend.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</header>

<?php if(Session::has('message')): ?>
    <div class="alert alert-success col-md-12">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo Session::get('message'); ?>

    </div>
<?php elseif(Session::has('error_message')): ?>
    <div class="alert alert-danger col-md-12">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong style="color: #FFFFFF;"><?php echo Session::get('error_message'); ?></strong>
    </div>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>

<!-- Main footer-->
<footer class="main-footer">

    <div class="container">
        <p><?php echo app('translator')->getFromJson('about.footer'); ?> </p>
        <a href='<?php echo e(route('PrivacyPolicy')); ?>' style='color:white'> - <?php echo app('translator')->getFromJson('home.privacy'); ?></a>
    <!--
        <ul class="social">
            <li><a href="https://www.facebook.com/FreeeDentist/" target='_blank'><i class="fab fa-facebook-f"></i></a>
            </li>
            <li><a href="https://instagram.com/freeedentist?igshid=pyztz5kwqmgv" target='_blank'><i
                            class="fab fa-instagram"></i></a></li>
            <li><a href="https://twitter.com/FreeeDentist?s=09" target='_blank'><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCaEyT8EPMl4PJrrK1aDgGlQ" target='_blank'><i
                            class="fab fa-youtube"></i></a></li>
        </ul> -->
    </div>
</footer>
<!-- End Main footer-->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/ar-sa.js"></script>-->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?php echo e(asset('assets/js/jquery.dd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>


<script src="<?php echo e(asset('assets/js/star-rating.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/theme.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/functions.js')); ?>"></script>


<script src="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/js/jquery.calendars.js"></script>
<script src="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/js/jquery.calendars.plus.min.js"></script>
<script src="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/js/jquery.plugin.min.js"></script>
<script src="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/js/jquery.calendars.picker.js"></script>
<script src="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/js/jquery.calendars.islamic.min.js"></script>


<link href="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/css/jquery.calendars.picker.css" rel="stylesheet"/>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php if(Auth::guard('client')->check()||Auth::guard('dentist')->check()): ?>
    <!--    check if pusher is allowed -->
    <?php if(config('chatmessenger.use_pusher')): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/4.2.1/pusher.min.js"></script>

        <script type="text/javascript">

            $(document).ready(function () {
                $('#period').change(function () {
                    if (this.checked) {

                        document.getElementById("end_datex").style.display = "block";
                        document.getElementById("dayx").style.display = "block";
                        <?php if (app()->getLocale() == 'ar') {?>
                            name = "بداية الفترة";
                            <?php } else {?>
                        var name = "start date";
                        <?php } ?>
                        document.getElementById("date_name").innerHTML = name;
                    } else {
                        document.getElementById("end_datex").style.display = "none";
                        document.getElementById("dayx").style.display = "none";
                        <?php if (app()->getLocale() == 'ar') {?>
                            name = "التاريخ";
                            <?php } else {?>
                        var name = "Date";
                        <?php } ?>
                        document.getElementById("date_name").innerHTML = name;
                    }
                });

                $('#form_messages').submit(function (e) {

                    e.preventDefault();

                    var data = $(this).serialize();
                    var url = $(this).attr('action');
                    var method = $(this).attr('method');

                    // clear textarea/ reset form
                    $(this).trigger('reset');

                    $.ajax({
                        method: method,
                        data: data,
                        url: url,
                        success: function (response) {

                            var thread = $('#thread_' + response.message.thread_id);

                            $('body').find(thread).append(response.html);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                });

                var pusher = new Pusher('<?php echo e(config('pusher.connections.main.auth_key')); ?>', {
                    cluster: '<?php echo e(config('pusher.connections.main.options.cluster')); ?>',
                    encrypted: true
                });


                    <?php if(isset(Auth::guard('client')->user()->id)): ?>
                {
                    var channel = pusher.subscribe('for_user_<?php echo e(Auth::guard("client")->user()->id); ?>');
                }
                    <?php elseif(isset(Auth::guard('dentist')->user()->id)): ?>
                {
                    var channel = pusher.subscribe('for_user_<?php echo e(Auth::guard("dentist")->user()->id); ?>');
                }
                <?php endif; ?>
                channel.bind('new_message', function (data) {
                    // console.log(data);
                    var thread = $('#' + data.div_id);
                    var thread_id = data.thread_id;
                    var thread_plain_text = data.text;
                    var thread_subject = data.thread_subject;


                    if (thread.length) {
                        // thread opened

                        // append message to thread
                        thread.append(data.html);

                        // make sure the thread is set to read
                        $.ajax({
                            url: "/messages/" + thread_id + "/read"
                        });
                    } else {
                        // thread not currently opened

                        // create message
                        var message = '<strong>' + data.sender_name + ': </strong>' + data.text + '<br/><a href="' + data.thread_url + '" class="text-right">View Message</a>';

                        // notify the user
                        toastr.success(thread_subject + '<br/>' + message);

                        // set unread count
                        let url = "<?php echo e(route('messages.unread')); ?>";
                        console.log(url);
                        $.ajax({
                            method: 'GET',
                            url: url,
                            success: function (data) {
                                console.log('data from fetch: ', data);
                                var div = $('#unread_messages');

                                var count = data.msg_count;
                                if (count == 0) {
                                    $(div).addClass('hidden');
                                } else {
                                    $(div).text(count).removeClass('hidden');

                                    // if on messages.index - add alert class and update latest message
                                    $('#thread_list_' + thread_id).addClass('alert-info');
                                    $('#thread_list_' + thread_id + '_text').html(thread_plain_text);
                                }
                            }
                        });
                    }
                });
            });
        </script>
    <?php endif; ?>
<?php endif; ?>

<script type="text/javascript">

    $('#datetimepickerDate1').datetimepicker({

        format: 'Y-M-D',
        endDate: "today",
        maxDate: new Date(),
    });

    var today = new Date();
    //var tomorrow = new Date(today.getTime() + (24 * 60 * 60 * 1000));
    $('#datetimepickerDate').datetimepicker({
        minDate: today,
        useCurrent: false,
        format: 'Y-M-D'
    });

    $('#datetimepickerDate2').datetimepicker({
        minDate: new Date(),

        format: 'Y-M-D'

    });


    $('#datetimepickerTime1').datetimepicker({
            format: 'HH:mm A',
    });

    function start_date_picker(value){

        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();

        var formated_today = yyyy+'-'+mm+'-'+dd;

        if(value == formated_today){

            var time = (today.getTime())+(1*60*60*1000);

            $('#datetimepickerTime1').datetimepicker('minDate', new Date(time));

        }else{
            $('#datetimepickerTime1').datetimepicker('minDate', moment({y: 1900}));
        }

    }




    $('#langSwitch').change(function () {
        var locale = $(this).val();
//	alert(locale);
        var _token = $('input[name=_token]').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            type: 'POST',
            url: "<?php echo e(url('/language')); ?>",
            data: {_token: _token, locale: locale},
            success: function (response) {

                window.location.reload(true);
            }
            , error: function () {
                alert("error!!!!");
            }

        });
//$.post(url+'changeLanguage',{'local':local,'_token':_token},function (data) {
//window.location.reload(true);
//});

    });

</script>

<script>
    $(document).ready(function () {

        $(".nav-link").click(function () {

            var href = $(this).attr('href');
            var data1 = "";
            $.ajax({
                method: "GET",
                data: data1,
                url: href,
                success: function (response) {

                    $('#message1').html(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });

        });


        function load_unseen_notification(view = '') {
            //	alert('s');
            //  var token = $("input[name='_token']").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                url: "<?php echo route('getNotification') ?>",
                method: "post",
                data: {view: view},
                dataType: "json",
                success: function (data) {
                  //console.log(data);
                    $('#notfy').html(data.notification);

                    if (data.unseen_notification > 0) {
                        document.getElementById("notfired").innerHTML = '<span class="notifiNum count" style="border-radius:10px;"></span>';
                        $('.count').html(data.unseen_notification);
                        document.getElementById("notfired").style.display = 'block';
                    }
                }
            });
        }

        load_unseen_notification();

        $('#comment_form').on('submit', function (event) {
            event.preventDefault();
            if ($('#subject').val() != '' && $('#comment').val() != '') {
                var form_data = $(this).serialize();
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: form_data,
                    success: function (data) {
                        $('#comment_form')[0].reset();
                        load_unseen_notification();
                    }
                });
            } else {
                alert("Both Fields are Required");
            }
        });

        $('.dropdownxx').on('focusout', function(event){
                 $('.count').html('');
                 document.getElementById("notfired").innerHTML = '';
                 load_unseen_notification('yes');
                 document.getElementById("notfired").style.display = 'none';
        });

        setInterval(function () {
            load_unseen_notification();
        }, 8000);

    });
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH /home/dentist/public_html/resources/views/frontend/app.blade.php ENDPATH**/ ?>