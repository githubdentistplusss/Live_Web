 <div class="message-send">
 <form action="<?php echo e(route('messages.update', $thread->id)); ?>" id="form_messages" method="put">
 <?php echo csrf_field(); ?>
                              <div class="row">
                                <div class="col-10">
                                  <textarea class="form-control send-msg" name="message" placeholder="<?php echo app('translator')->getFromJson('mesg.message'); ?>"><?php echo e(old('message')); ?></textarea>
                                  <button type="submit" class="btn btn-primary form-control"><?php echo app('translator')->getFromJson('mesg.submit'); ?></button>
                                 <!-- <label class="custom-file-upload" for="img-upload"><i class="far fa-image"></i></label>-->
                                  <!--<input id="img-upload" type="file">-->
                                </div>
                                <div class="col-2">
                                  <div id="controls">
                                    <!--<button id="recordButton"><i class="fas fa-microphone"></i></button>-->
                                  </div>
                                </div>
                                <!--<div class="col-12">
                                  <button id="pauseButton" disabled>ايقاف موقت</button>
                                  <button id="stopButton" disabled>ايقاف</button>
                                  <div id="formats">
                                    <p></p>
                                  </div>
                                  <ol id="recordingsList"></ol>
                                </div>
                              </div>-->
                              </form>
 </div><?php /**PATH /home/dentist/public_html/resources/views/messenger/partials/form-message.blade.php ENDPATH**/ ?>