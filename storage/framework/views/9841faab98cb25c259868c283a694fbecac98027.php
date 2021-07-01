<?php $__env->startSection('content'); ?>

<!-- Main Content-->
<main class="main-content">
      <!--messages section-->
      <section class="messages">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('mesg.messages'); ?> </h2>
            <?php if(isset(Auth::guard('dentist')->user()->id)): ?>
            <a href="<?php echo e(route('dentistDashboard')); ?>"><?php echo app('translator')->getFromJson('login.account'); ?> >> </a>
            <?php else: ?>
            <a href="<?php echo e(route('clientDashboard')); ?>"><?php echo app('translator')->getFromJson('login.account'); ?> >> </a>
            <?php endif; ?>
            <?php echo $__env->make('messenger.partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
        </div>
        <div class="container">
          <div class="contentWrap">
            <div class="content">
              <div class="row allMsgs">
                <div class="col-md-5 padd0">
                  <div class="hidden-sm-up" id="msg-mnu"><i class="fas fa-ellipsis-v"></i></div>
                  <div class="open-msgs">
                      
                    <ul class="nav nav-tabs">
                    <?php echo $__env->renderEach('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads'); ?>
                    </ul>
                  </div>
                </div>
                <?php if($thread): ?>
                <div class="col-md-7 padd0" >
                  <div class="tab-content">
                    <div class="tab-pane container active" id="message1">
                            <div class="msg-head">
                              <div class="row">
                                <div class="col-6">
                                  <div class="pro-img"><img src="assets/imgs/messages/messageImg.png"></div>
                                </div>
                                <div class="col-6">
                                  <h4 class="blue"><?php echo e($thread->subject); ?></h4>
                                  <h5 class="grey3">أسم المستشفى</h5>
                                </div>
                              </div>
                            </div>
                            <div class="msgs">
                              <div class="message-content" id="thread_<?php echo e($thread->id); ?>">


                                <?php $i=0;?>
                                  <?php $__currentLoopData = $mess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($i % 2 == 0): ?>
                                <div class="msg-from">
                                <?php else: ?> 
                                <div class="msg-to">
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-12">
                                      <div class="box-msg">
                                        <p><?php echo e($m->user->name); ?></p>
                                        <p><?php echo e($m->body); ?></p>
                                        <span class="grey3"><?php echo app('translator')->getFromJson('mesg.delivered'); ?> <?php echo e($m->created_at->diffForHumans()); ?> </span>
                                      </div>
                                    </div>
                                  </div>
                                 </div>
                                <?php  $i++;?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              </div>
                              
                            </div>
                          
                    </div>
                      <?php echo $__env->make('messenger.partials.form-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                   
               
                  
                    </div> <!--sss-->
                  </div>
                </div>
                   <?php endif; ?>
                <!-- end messages-->
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- End Main Content-->

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/messenger/index.blade.php ENDPATH**/ ?>