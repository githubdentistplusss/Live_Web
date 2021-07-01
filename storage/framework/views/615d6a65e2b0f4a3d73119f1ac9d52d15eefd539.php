<?php $__env->startSection('content'); ?>
  <main class="main-content">
      <!--account section-->
      <!--flollowerModal-->
      <div class="modal" id="flollowerModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			 <form method="POST" action="<?php echo e(route('createFollower')); ?>">
                        <?php echo csrf_field(); ?>

              <div class="form-group">
                <div class="row">
                  <div class="col-2">
                    <div class="icon"><img src="assets/imgs/reserve/user.svg"></div>
                  </div>
                  <div class="col-10">
                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.fName'); ?></h4>
                    <input class="form-control loginInput"  name="name" required type="text">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-2">
                    <div class="icon"><img src="assets/imgs/account/lang.svg"></div>
                  </div>
                  <div class="col-10">
                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.nationality'); ?></h4>
                  
					 <select class="form-control loginInput" name="nationality" id="nationality" required>
                                                    <option value=""><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
                                                    <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option  value="<?php echo e($nationality->id); ?>">
					<?php if( app()->getLocale()=='ar'): ?>
					<?php echo e($nationality->nationality_name_ar); ?>

					<?php elseif( app()->getLocale()=='en'): ?>
					<?php echo e($nationality->nationality_name_en); ?>

					<?php endif; ?>
					</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-2">
                    <div class="icon"><img src="assets/imgs/account/lang.svg"></div>
                  </div>
                  <div class="col-10">
                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.birthdate'); ?></h4>
                   <input class="form-control loginInput" type="text" id="datetimepickerDate1" value="" name="birthdate" data-toggle="datetimepicker" data-target="#datetimepickerDate1">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <h4 class="grey3"><?php echo app('translator')->getFromJson('login.gender'); ?></h4>
                <div class="row">
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" value="Male" type="radio" name="gender">
						<?php echo app('translator')->getFromJson('login.male'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" value="Female" type="radio" name="gender"><?php echo app('translator')->getFromJson('login.female'); ?>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <d iv class="form-group">
                <h4 class="grey3"><?php echo app('translator')->getFromJson('login.relation'); ?></h4>
                <div class="row">
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="friend" name="relation"><?php echo app('translator')->getFromJson('login.friend'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="brother" name="relation"><?php echo app('translator')->getFromJson('login.brother'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" value="wife" type="radio" name="relation"><?php echo app('translator')->getFromJson('login.wife'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="husband" name="relation"><?php echo app('translator')->getFromJson('login.husband'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="son" name="relation"><?php echo app('translator')->getFromJson('login.son'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="daughter" name="relation"><?php echo app('translator')->getFromJson('login.daughter'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="father" name="relation"><?php echo app('translator')->getFromJson('login.father'); ?>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" value="mother" name="relation"><?php echo app('translator')->getFromJson('login.mother'); ?>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button class="navBtn" type="submit"><?php echo app('translator')->getFromJson('login.addf'); ?> </button>
              </div>
			  </form>
            </div>
          </div>
        </div>
      </div>
      <!--end flollowerModal-->
      <section class="account">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('login.account'); ?></h2>
          </div>
        </div>
        <div class="container">
          <div class="contentWrap">
            <div class="content2">
              <div class="text-center">
                <div class="profile-img"><img src="assets/imgs/account/profileImg.png"></div>
                <h3 class="blue"><?php echo e(Auth::guard('client')->user()->name); ?></h3>
                <div class="det">
                  <div class="h5"> <i class="fas fa-at"></i><?php echo e(Auth::guard('client')->user()->email); ?></div>
                </div>
                <div class="det">
                  <div class="h5"><i class="fas fa-mobile-alt"></i><?php echo e(Auth::guard('client')->user()->mobile); ?></div>
                </div>
              </div>
            </div>
			  <ul class="account-mnu">
              <li> <a class="dropdown-item" href="<?php echo e(route('UReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.uDate'); ?></a></li>
              <li><a class="dropdown-item" href="<?php echo e(route('UAReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.uADate'); ?></a></li>
              <li>   <a class="dropdown-item" href="<?php echo e(route('prevReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.pDate'); ?> </a></li>
             <!-- <li>  <a class="dropdown-item" href="<?php echo e(route('messages')); ?>"><?php echo app('translator')->getFromJson('resrv.msg'); ?> <?php echo $__env->make('messenger.unread-count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a></li>-->
                 </ul>
            <div class="accordion" id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <div class="row">
                    <div class="col-3 col-md-2 col-lg-1">
                      <div class="icon"><img src="assets/imgs/account/medical.svg"></div>
                    </div>
                   <!-- <div class="col-9 col-md-10 col-lg-11">
                      <h5 class="grey3"><?php echo app('translator')->getFromJson('login.hospital'); ?></h5>
                      <h4 class="blue2">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">طيبة</button>
                      </h4>
                    </div>-->
					<a href="<?php echo e(route('profile')); ?>"><?php echo app('translator')->getFromJson('login.accountEdit'); ?></a>
                  </div>
                </div>
                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3 col-md-2 col-lg-1"></div>
                      <div class="col-9 col-md-10 col-lg-11">
                        <p>طيبة</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <div class="row">
                    <div class="col-3 col-md-2 col-lg-1">
                      <div class="icon"><img src="assets/imgs/account/followers.svg"></div>
                    </div>
                    <div class="col-9 col-md-10 col-lg-11">
                      <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.follower'); ?>  </h5>
                      <h4 class="blue2">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><?php echo app('translator')->getFromJson('resrv.addFollower'); ?></button>
                      </h4>
                    </div>
                  </div>
                </div>
                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3 col-md-2 col-lg-1"></div>
                      <div class="col-9 col-md-10 col-lg-11">
                        <ul>
						<?php $__currentLoopData = $Allfollowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <li><a href="<?php echo e(url('editFollower/'.$follower->id)); ?>"><?php echo e($follower->name); ?></a> 
						 <div style="width: 60%;float:left;margin-top: -20px">
			  <form  action="<?php echo e(route('deleteFollower', $follower->id)); ?>" method="post">

                                                            <?php echo e(csrf_field()); ?>


                                                            <?php echo e(method_field('DELETE')); ?>


                                                            <button class="btn btn-icon btn-pure " type="submit" onclick="return confirm('انت على وشك حذف عنصر. هل أنت متأكد ؟!');"><i class="ft-trash-2"></i><?php echo app('translator')->getFromJson('login.delete'); ?></button>

                                                        </form>	</div>		 
						 </li>
                         <!--  <li>تابع 2</li>
                          <li>تابع 3</li>-->
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  <li>
                            <button class="btnPlus" data-toggle="modal" data-target="#flollowerModal"><i class="fas fa-plus"></i><span><?php echo app('translator')->getFromJson('resrv.addFollower'); ?></span></button>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                
                 <div class="card-header" id="headingTwo">
                  <div class="row">
                    <div class="col-3 col-md-2 col-lg-1">
                      <div class="icon"><i class="fa fa-images fa-lg" style="  color: #1e9ffa;
    text-shadow: 1px 1px 1px #ccc;
    font-size: 1.5em;"></i>

</div>
                    </div>
                    <div class="col-9 col-md-10 col-lg-11">
                      <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.gallery-p'); ?>  </h5>
                     
                    </div>
                  </div>
                </div>
                  <?php if($client->gallery): ?>
                <div id="carouselExampleIndicators" class="carousel slide centre center" data-ride="carousel" style="margin-left: auto;
    margin-right: auto;">
                     <ol class="carousel-indicators">
                        
                         <?php $__currentLoopData = $client->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($key); ?>" class="<?php echo e($loop->first?'active' :''); ?>"></li>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </ol>
  <div class="carousel-inner">
   
     <?php $__currentLoopData = $client->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="carousel-item <?php echo e($loop->first?'active':''); ?>" >
      <img class="d-block w-100" src="<?php echo e(asset('images/patient/'.$value)); ?>" style="max-width:440px; max-height:440px;" alt="First slide">
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
  </div>
 
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php else: ?>
<p style="margin-left: auto;
    margin-right: auto;">No Photos is found</p>
                  <?php endif; ?>
              </div>
            <!--  <div class="card">
                <div class="card-header" id="headingThree">
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
                </div>
                <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3 col-md-2 col-lg-1"></div>
                      <div class="col-9 col-md-10 col-lg-11">
                        <p>عربى</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>-->
            </div>
          </div>
        <!--  <div class="btns">
            <button class="navBtn">تسجيل خروج</button>
          </div>-->
        </div>
      </section>
    </main>



  

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type='text/javascript'>
            (function() {
                'use strict';
                function remoteModal(idModal){
                    var vm = this;
                    vm.modal = $(idModal);

                    if( vm.modal.length == 0 ) {
                        return false;
                    }

                    if( window.location.hash == idModal ){
                        openModal();
                    }

                    var services = {
                        open: openModal,
                        close: closeModal
                    };

                    return services;
                    ///////////////

                    // method to open modal
                    function openModal(){
                        vm.modal.modal('show');
                    }

                    // method to close modal
                    function closeModal(){
                        vm.modal.modal('hide');
                    }
                }
                Window.prototype.remoteModal = remoteModal;
            })();

            $(function(){
                window.remoteModal('#flollowerModal');
            });
        </script>
        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/frontend/client/account.blade.php ENDPATH**/ ?>