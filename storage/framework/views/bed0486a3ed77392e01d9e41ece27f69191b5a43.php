<?php $__env->startSection('title','Dentists'); ?>

<?php $__env->startSection('content'); ?>


    <?php if(isset($objects)): ?>

        <div class="container">

            <div class="row">


                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">

                            <div class="heading-elements">

                              <a href="<?php echo e(route('adddentist')); ?>" class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">Add New</a>



                            </div>

                        </div>

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">

                                    <table id="myTable" class="display" style="width:100%,z-index:9999">

                                        <thead>

                                        <tr>

                                            <th>#</th>

                                            <th>Name</th>


                                            <th>Code</th>

                                            <th>Mobile</th>
                                           <th>Hopsital</th>
                                            <th>Card?</th>
                                                                                        <th>Status</th>

                                            <th class="text-center">Actions</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                          <?php if(count($objects)): ?>

                                          <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                              <?php if($object->admin != 2): ?>

                                                  <tr>

                                                  <td><?php echo e($object->id); ?></td>

                                                  <td><?php echo e($object->name . " " . $object->last_name); ?></td>



                                                  <td><?php echo e($object->code); ?></td>
                                                    <td><?php echo e($object->mobile); ?></td>
                                                     
                                                     
                                                      <td><?php echo e($object->related_hospital['hospital_name_ar']); ?></td>
                                                          <td> 
                                                 <?php if($object->photo=="" || $object->photo=="default.png"): ?>
                                                <span style="color:red" ><b>No              </b></span>
                                                <?php else: ?>
                                                <span >Yes</span>
                                                <?php endif; ?>
                                                </td>
                                                      
                                                         <?php if($object->active!=0): ?>
                                                      
                                                      <td >
                                                        <form action="<?php echo e(route('disabledentist', $object->id)); ?>" method="post">

                                                             <?php $__currentLoopData = Auth::user()->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                                          <?php if($per->per_name == 'disabledentist'): ?>
                                                             <?php echo e(csrf_field()); ?>


                                                                    <?php echo e(method_field('PUT')); ?>

                                                                    <button class="btn btn-icon btn-pure danger" type="submit"  onclick="return confirm('انت على وشك التعطيل');"><i class="ft-trash-2"></i>انقر للتعطيل</button>

                                                                </form>
                                                           <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </td>

                                                       
                                                      
                                                      <?php else: ?>
                                                      


                              <td> <form action="<?php echo e(route('activatedentist', $object->id)); ?>" method="post">
   <?php $__currentLoopData = Auth::user()->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                                          <?php if($per->per_name == 'disabledentist'): ?>
                                                             <?php echo e(csrf_field()); ?>


                                                                    <?php echo e(method_field('PUT')); ?>

                                                                    <button style="background-color:red" class="btn btn-icon btn-pure danger" type="submit"  onclick="return confirm('انت على وشك التفعيل');"><i class="ft-trash-2"></i>انقر للتفعيل</button>

                                                                </form>
                                                       <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                                         

                                                         

                                                          <?php endif; ?>
                                                  <td><div class="container">

                                                      <div class="row">



                                                              <?php $__currentLoopData = Auth::user()->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                                              <?php if($per->per_name == 'edituser'): ?>



                                                          <a href="<?php echo e(route('editdentist', $object->id)); ?>" class="btn btn-icon btn-pure info">تعديل</a>

                                                          <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                          <?php $__currentLoopData = Auth::user()->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                                          <?php if($per->per_name == 'deletedentist'): ?>



                                                                <form action="<?php echo e(route('deletedentist', $object->id)); ?>" method="post">

                                                                    <?php echo e(csrf_field()); ?>


                                                                    <?php echo e(method_field('DELETE')); ?>




                                                                    <button class="btn btn-icon btn-pure danger" type="submit"  onclick="return confirm('انت على وشك الحذف');"><i class="ft-trash-2"></i>حذف</button>





                                                                </form>

                                                                <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                          </div>



                                                  </div></td>

                                              </tr>

                                              <?php endif; ?>


                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                      <?php else: ?>

                                          <tr>

                                              <td colspan="7">لا يوجد اعضاء</td>

                                          </tr>

                                      <?php endif; ?>

                                    </tbody>



                                    </table>

                                </div>

                                <!--Table Wrapper Finish-->

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

















        </div>



    <?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/backstage/dentists/index.blade.php ENDPATH**/ ?>