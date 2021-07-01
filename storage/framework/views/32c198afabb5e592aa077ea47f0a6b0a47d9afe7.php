<?php $__env->startSection('title','sicks'); ?>

<?php $__env->startSection('content'); ?>


    <?php if(isset($users)): ?>

        <div class="container">

            <div class="row">
               
                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements">

                                <a href="<?php echo e(route('addsick')); ?>"
                                   class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">Add New</a>

                            </div>

                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body">
                            <div class="col-md-12">


<form action="<?php echo e(route('sickSerach')); ?>" method="get" class="card-content collapse show" role="form"
      id="filter_form">

    <div class="form-group col-md-4">
        <h4 class="card-title" style="margin-top:20px">Search</h4>

        <label class="sr-only" for="s">search</label>

        <input required name="user_s"
               <?php if(!empty($_GET['user_s'])){ ?> value="<?php echo e($_GET['user_s']); ?>"
               <?php } ?> class="form-control validate[minSize[3]]" id="s"
               placeholder="patient name/mobile/email">

        <input type="hidden" name="real_filter" value="true"/>


    </div>

    <div class="form-group">

        <input type="submit" value="Search"
               class="btn btn-info box-shadow-1  btn-min-width ml-1 mr-1">

        <a href="<?php echo e(route('showsick')); ?>" class="btn btn-secondary box-shadow-1 btn-min-width">All</a>

    </div>

</form>

</div>
                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">

                                      <table class="display table" style="width:100%,z-index:9999">


                                        <thead>

                                        <tr>

                                            <th>#</th>

                                            <th>Name</th>

                                            <th>Email</th>

                                            <th>Mobile</th>
                                            <th>City</th>
                                            <th>Nationality</th>
                                             <th>Activate</th>

                                            <th class="text-center">Actions</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        <?php if(count($users)): ?>



                                            <?php

                                            $_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;

                                            $counter = intval($_per_page * intval($_page - 1)) + 1;

                                            ?>



                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($object->admin == 2): ?>

                                                    <tr>

                                                        <td><?php echo e($counter); ?></td>

                                                        <td><?php echo e($object->name . " " . $object->last_name); ?></td>


                                                        <td><?php echo e($object->email); ?></td>

                                                        <td><?php echo e($object->mobile); ?></td>
                                                        <td><?php echo e($object->city['city_name_en']); ?></td>
                                                        <td><?php echo e($object->nationalty['nationality_name_en']); ?></td>
                                                          <td><span class="btn <?php echo e($object->active ==1?'btn-primary':'btn-success'); ?>"><?php echo e($object->active ==1?'Activated': 'Deactivated'); ?></span></td>

                                                        <td>
                                                            <div class="container">

                                                                <div class="row">


                                                                    <?php $__currentLoopData = Auth::user()->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                                                        <?php if($per->per_name == 'edituser'): ?>



                                                                            <a href="<?php echo e(route('editsick', $object->id)); ?>"
                                                                               class="btn btn-icon btn-pure info">Edit</a>

                                                                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                    <?php $__currentLoopData = Auth::user()->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                                                        <?php if($per->per_name == 'deletesick'): ?>



                                                                            <form action="<?php echo e(route('deletesick', $object->id)); ?>"
                                                                                  method="post">

                                                                                <?php echo e(csrf_field()); ?>


                                                                                <?php echo e(method_field('DELETE')); ?>



                                                                                <button class="btn btn-icon btn-pure danger"
                                                                                        type="submit"
                                                                                        onclick="return confirm('Are you sure Delete Item');">
                                                                                    <i class="ft-trash-2"></i>delete
                                                                                </button>


                                                                            </form>

                                                                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </div>


                                                            </div>
                                                        </td>

                                                    </tr>

                                                <?php endif; ?>

                                                <?php $counter++; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php else: ?>

                                            <tr>

                                                <td colspan="7">No Sicks</td>

                                            </tr>

                                        <?php endif; ?>

                                        </tbody>


                                    </table>

                                </div>

                                <!--Table Wrapper Finish-->
                                <?php echo e($users->links()); ?>


                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>



    <?php endif; ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/backstage/sicks/index.blade.php ENDPATH**/ ?>