


 <li class="nav-item">
     <a class="nav-link"  href="<?php echo e(route('messages.show', $thread->id)); ?>" data-toggle="tab">
                                <div class="message">
                                  <div class="row">
                                    <div class="col-3 col-lg-2 padd0">
                                      <div class="pro-img"><img src="assets/imgs/messages/messageImg.png"></div>
                                    </div>
                                    <div class="col-6 col-lg-8">
                                      <h4 class="blue"><?php echo e($thread->subject); ?></h4>
                                      <h5 class="grey3"><?php echo e($thread->creator()->name); ?></h5>
                                      <p class="text grey3"> <?php echo e($thread->latestMessage->body); ?></p>
                                    </div>
                                    <div class="col-3 col-lg-2">
                                      <h5 class="grey3 msgTime">
                                      
 
                                      </h5>
                                    </div>
                                  </div>
                              </div>
                     </a>
</li>

<?php /**PATH /home/dentist/public_html/resources/views/messenger/partials/thread.blade.php ENDPATH**/ ?>