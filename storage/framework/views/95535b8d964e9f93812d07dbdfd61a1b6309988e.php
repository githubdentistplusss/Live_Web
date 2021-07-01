    <?php $__env->startSection('title','Send Notification'); ?>

<?php $__env->startSection('title','Edit Dentist'); ?>

<?php $__env->startSection('content'); ?>

     
        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">


                            <div class="card-body">

                                <form enctype="multipart/form-data" id="page_forme" action="<?php echo e(route('notifyAction')); ?>"
                                      class="form ls_form validate_form" method="post">

                                    <?php echo e(csrf_field()); ?>



                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> Send Notifications</h4>

                                
                                        <div class="form-group col-md-8">

                                            <label for="title">

                                                title

                                            </label>
                                            <input type="text" id="title" class="form-control"
                                                   name="title" required value="" autofocus>

                                        </div>
                                    <div class="form-group col-md-8">

                                            <label for="message">

                                                message

                                            </label>

                                            <textarea  id="message" class="form-control"
                                                   name="message" required value="" autofocus></textarea>

                                        </div>
                                        
                                        <div class="form-group col-md-8 row text-center"">
                                            <div class="col-md-3">
                                                   <input class="form-check-input " type="radio" name="notify" id="exampleRadios1" value="0" checked>
                                                         <label class="form-check-label" for="exampleRadios1">
                                                                   Patient
                                                          </label>
                                              </div>
                                                   <div class="col-md-3">
                                                   <input class="form-check-input " type="radio" name="notify" id="exampleRadios2" value="1">
                                                         <label class="form-check-label" for="exampleRadios2">
                                                                   Dentist
                                                          </label>
                                                    </div>

                                        </div>
                                    
                                    </div>


                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary btn-min-width box-shadow-1 ml-1"><i
                                                    class="la la-check-square-o"></i>

                                            Send
                                        </button>

                                       </div>

                                </form>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

           

        </div>











<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shahin/Sites/dentist-backend/resources/views/backstage/notify.blade.php ENDPATH**/ ?>