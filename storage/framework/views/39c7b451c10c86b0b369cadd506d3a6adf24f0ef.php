<?php $__env->startSection('og_meta'); ?>
<meta calss='ogimage' property="og:image" content="<?php echo e(url('/').'/storage/'.Auth::guard('dentist')->user()->card); ?>">
<meta calss='ogimage' property="og:url" content="<?php echo e(url('/').'/storage/'.Auth::guard('dentist')->user()->card); ?>">
<meta property="og:title" content="<?php echo e(Auth::guard('dentist')->user()->name); ?>">
<meta calss='ogimage' name="twitter:card" content="<?php echo e(url('/').'/storage/'.Auth::guard('dentist')->user()->card); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <main class="main-content">
      <!--doctorAccount section-->
	
      <section class="account">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('login.account'); ?></h2>
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
          </div>
        </div>
	
		
        <div class="container">
          <div class="contentWrap">
            <div class="content2">
              <div class="text-center">
                <div class="profile-img"><img src="<?php echo e(asset('images/'.Auth::guard('dentist')->user()->profile_photo)); ?>" width="100" style="border-radius: 50px"></div>
                <h3 class="blue"><?php echo e(Auth::guard('dentist')->user()->name); ?></h3>
                <div class="det">
                  <div class="h5">الكود: <?php echo e(Auth::guard('dentist')->user()->code); ?></div>
                </div>
                <div class="det">
                  <div class="h5"> <i class="fas fa-at"></i><?php echo e(Auth::guard('dentist')->user()->email); ?></div>
                </div>
                <div class="det">
                  <div class="h5"><i class="fas fa-mobile-alt"></i><?php echo e(Auth::guard('dentist')->user()->mobile); ?></div>
                </div>
               
                <!--<div class="det">
                  <div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
                </div>-->
              </div>
            </div>
          </div>
		    <ul class="account-mnu">
              <li> <a class="dropdown-item" href="<?php echo e(route('upcommingReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.uDate'); ?></a></li>
              <li><a class="dropdown-item" href="<?php echo e(route('upcommingAcceptedReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.uADate'); ?></a></li>
              <li> <a class="dropdown-item" href="<?php echo e(route('prevReservationD')); ?>"><?php echo app('translator')->getFromJson('resrv.pDate'); ?></a></li>
             <!-- <li> <a class="dropdown-item" href="<?php echo e(route('messages')); ?>"><?php echo app('translator')->getFromJson('resrv.msg'); ?> <?php echo $__env->make('messenger.unread-count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a></li>-->
              <li><a href="<?php echo e(url('add_calander')); ?>"> <?php echo app('translator')->getFromJson('mesg.calander'); ?></a></li>
            </ul>
          <div class="accordion" id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <div class="row">
                  <div class="col-3 col-md-2 col-lg-1">
                    <div class="icon"><img src="assets/imgs/account/medical.svg"></div>
                  </div>
                  <div class="col-9 col-md-10 col-lg-11">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('login.account'); ?></h5>
                    <h4 class="blue2">
                     <!-- <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">طيبة</button>-->
					 <a href="<?php echo e(url('Dprofile')); ?>"><?php echo app('translator')->getFromJson('login.accountEdit'); ?></a>
                    </h4>
                  </div>
                </div>
              </div>
              <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 col-md-2 col-lg-1"></div>
                    <div class="col-9 col-md-10 col-lg-11">
                      <input class="loginInput form-control" value="طيبة">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="content2">
              <div class="row">
                <div class="col-3 col-md-2 col-lg-1">
                  <div class="icon"><img src="assets/imgs/reserve/broken-tooth.svg"></div>
                </div>
                <div class="col-9 col-md-10 col-lg-11">
                  <h5 class="grey3"> <?php echo app('translator')->getFromJson('mesg.calander'); ?></h5>
                  <div class="h4 blue2">
                    <div class="button no-btn"> <a href="<?php echo e(url('add_calander')); ?>"><?php echo e($services); ?></a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <!--<div class="card-header" id="headingThree">
                <div class="row">
                  <div class="col-3 col-md-2 col-lg-1">
                    <div class="icon"><img src="assets/imgs/account/lang.svg"></div>
                  </div>
                  <div class="col-9 col-md-10 col-lg-11">
                    <h5 class="grey3">لغه التواصل  </h5>
                    <h4 class="blue2">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">عربى</button>
                    </h4>
                  </div>
                </div>
              </div>-->
              <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 col-md-2 col-lg-1"></div>
                    <div class="col-9 col-md-10 col-lg-11">
                      <input class="loginInput form-control" value="عربى">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFour">
                <div class="row">
                  <div class="col-3 col-md-2 col-lg-1">
                    <div class="icon"><img src="assets/imgs/account/social.svg"></div>
                  </div>
                  <div class="col-9 col-md-10 col-lg-11">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.social'); ?></h5>
                    <h4 class="blue2">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        <ul class="socialDoc">
                          <li><a href="#"><img src="assets/imgs/account/Snapchat.svg"></a></li>
                          <li><a href="#"><img src="assets/imgs/account/Facebook.svg"></a></li>
                          <li><a href="#"><img src="assets/imgs/account/Twitter.svg"></a></li>
                          <li><a href="#"><img src="assets/imgs/account/Instagram.svg"></a></li>
                        </ul>
                      </button>
                    </h4>
                  </div>
                </div>
              </div>
              <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 col-md-2 col-lg-1"></div>
                    <div class="col-9 col-md-10 col-lg-11">
                      <div class="row">
                        <div class="col-2 col-md-1"><img src="assets/imgs/account/Snapchat.svg"></div>
                        <div class="col-8 col-md-11">
                          <input class="loginInput form-control" placeholder="your account">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2 col-md-1"><img src="assets/imgs/account/Facebook.svg"></div>
                        <div class="col-8 col-md-11">
                          <input class="loginInput form-control" placeholder="your account">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2 col-md-1"><img src="assets/imgs/account/Twitter.svg"></div>
                        <div class="col-8 col-md-11">
                          <input class="loginInput form-control" placeholder="your account">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2 col-md-1"><img src="assets/imgs/account/Instagram.svg"></div>
                        <div class="col-8 col-md-11">
                          <input class="loginInput form-control" placeholder="your account">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                           <div class="card">
              <div class="card-header" id="headingFour">
                <div class="row">
                  <div class="col-3 col-md-2 col-lg-1">
                    <div class="icon"><img src="assets/imgs/account/social.svg"></div>
                  </div>
                  <div class="col-9 col-md-10 col-lg-11">
                    <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.socialShare'); ?></h5>
                    <h4 class="blue2">
                        <ul class="socialDoc">
                          <li><a href="#" onclick="fbShare();"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="#" onclick="twtShare();"><i class="fab fa-twitter"></i></a></li>
                          <li><a href="#" onclick="whatsappShare();"><i class="fab fa-whatsapp"></i></a></li>
                      </button>
                    </h4>
                  </div>
                </div>
              </div>
            
            </div>
          </div>
          <!--<div class="btns">
            <button class="navBtn">تسجيل خروج</button>
          </div>-->
        </div>
      </section>
             <?php echo $__env->make('vendor.partials.doc_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
    </main>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/html2canvas.min.js')); ?>"></script>

<script type="text/javascript">

$(window).on('load', function(){ 
  TheCard = document.getElementById("doc_card");
  u=TheCard.getAttribute('src');
  t=TheCard.getAttribute('alt');

 // if(u == '')
    captureCard();

});

function fbShare(){
  TheCard = document.getElementById("doc_card");
  u=TheCard.getAttribute('src');
  t=TheCard.getAttribute('alt');

  window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php echo e(url("/")); ?>/'+u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;
}

function twtShare(){

  TheCard = document.getElementById("doc_card");
  u=TheCard.getAttribute('src');
  t=TheCard.getAttribute('alt');


  var url = 'https://twitter.com/intent/tweet?url='+encodeURIComponent('<?php echo e(url("/")); ?>/'+u)+'&via=freedentist&text='+encodeURIComponent(t);
    TwitterWindow = window.open(url, 'TwitterWindow',width=626,height=436);
    return false;
}

function whatsappShare(){

  TheCard = document.getElementById("doc_card");
  src = TheCard.getAttribute('src');
  u=src+' ('+TheCard.getAttribute('alt')+' )';

     var url = 'https://wa.me?text='+encodeURIComponent('<?php echo e(url("/")); ?>/'+u);
     window.open(url, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=480');
     return false;
}


function captureCard(){

  var $hiddenElement = $("#capture").clone().css({ left: 0, top: 0, position: 'relative', display: 'block', visibility: 'visible', direction: 'initial' }).appendTo('body');
  var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
      var scale = 3;
			var width = parseInt($hiddenElement.prop('offsetWidth')) ;
      var height = parseInt($hiddenElement.prop('offsetHeight')); 
    
 $hiddenElement.remove();

 html2canvas($("#capture")[0], {
         allowTaint: true,
          useCORS: true,
          width: width ,
          height: height , 
         // logging:false,
          scale: scale,
          scrollY: -window.scrollY,
          onclone: function(document){
            hiddenDiv = document.getElementById('capture');
            hiddenDiv.style.display = 'block';
            hiddenDiv.style.position ='relative' ;
            hiddenDiv.style.top = '-'+window.innerHeight + 'px';
            hiddenDiv.style.marginTop = '-400px';
            
        }
      }).then(canvas => {
        
        var ctx = canvas.getContext('2d');
        ctx.webkitImageSmoothingEnabled = false;
        ctx.mozImageSmoothingEnabled = false;
        ctx.imageSmoothingEnabled = false;

        var imageType = "image/png";
        var imageData = canvas.toDataURL(imageType);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            url: '<?php echo e(route("uploadCard")); ?>',
            type: 'post',
            data: {card: imageData},
            success: function(data){
              if(data.status == 'success'){
               document.getElementById("doc_card").src = "storage/"+data.card;
               document.getElementById("doc_card").alt = "<?php echo e(Auth::guard('dentist')->user()->name); ?>";
               $('meta[calss="ogimage"]').attr('content',"<?php echo e(url('/')); ?>/storage/"+data.card);
              }
            },
            error: function (error) {
                console.log(error);
            }
         });
    });

}
   
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shahin/Sites/dentist-backend/resources/views/vendor/account.blade.php ENDPATH**/ ?>