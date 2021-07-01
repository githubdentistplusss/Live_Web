

<?php $__env->startSection('innercontent'); ?>

    <div class="card">
        <div class="card-body pt-0">

            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo e(route('clientDashboard')); ?>"><?php echo app('translator')->getFromJson('resrv.follower'); ?></a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('bookedoffers')); ?>"><span
                                class="med-records"><?php echo app('translator')->getFromJson('resrv.uDate'); ?></span></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('bookedservices')); ?>"><span
                                class="med-records">مواعيد الخدمات</span></a>
                    </li>
                   
                </ul>
            </nav>
            <!-- /Tab Menu -->

            <!-- Tab Content -->
            <div class="tab-content pt-0">

                <!-- Follower Tab -->
                <div id="pat_appointments" class="tab-pane fade show active">
                    <div class="pb-3">
                        <button data-toggle="modal" data-target="#flollowerModal" class="btn btn-sm add-new-btn">
                            <i class="fas fa-plus"></i> <?php echo app('translator')->getFromJson('resrv.addFollower'); ?>
                        </button>
                    </div>
                    <div class="card card-table mb-0">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Birth Date</th>
                                            <th>Gender</th>
                                            <th>Relation</th>
                                            <th style="">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $Allfollowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/assets/img/doctors/doctor-thumb-01.jpg"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="<?php echo e(url('editFollower/' . $follower->id)); ?>"><?php echo e($follower->name); ?>

                                                            <span><?php echo e($follower->relation); ?></span></a>
                                                    </h2>
                                                </td>
                                                <td><?php echo e($follower->birthdate); ?>

                                                </td>
                                                <td><?php echo e($follower->gender); ?></td>
                                                <td><?php echo e($follower->relation); ?></td>
                                                <td class="text-right">
                                                    <div class="table-action row">
                                                        <a href="<?php echo e(url('editFollower/' . $follower->id)); ?>"
                                                            class="btn btn-sm bg-primary-light">
                                                            <i class="fas fa-edit"></i> <?php echo app('translator')->getFromJson('login.edit'); ?>
                                                        </a>
                                                        <form class="pr-2"
                                                            action="<?php echo e(route('deleteFollower', $follower->id)); ?>"
                                                            method="post">

                                                            <?php echo e(csrf_field()); ?>


                                                            <?php echo e(method_field('DELETE')); ?>


                                                            <button class="btn btn-sm bg-danger-light" type="submit"
                                                                onclick="return confirm('انت على وشك حذف عنصر. هل أنت متأكد ؟!');"><i
                                                                    class="far fa-trash-alt"></i><?php echo app('translator')->getFromJson('login.delete'); ?></button>

                                                        </form>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Follower Tab -->

            </div>
            <!-- Tab Content -->

        </div>
    </div>
    <!--flollowerModal-->
    <div class="modal fade call-modal" id="flollowerModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><?php echo app('translator')->getFromJson('login.addf'); ?></h3>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo e(route('createFollower')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-1">
                                    <h4 class="grey3">&nbsp;</h4>
                                    <div class="icon pt-2"><img src="assets/imgs/reserve/user.svg"></div>
                                </div>
                                <div class="col-11">
                                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.fName'); ?></h4>
                                    <input class="form-control loginInput" name="name" required type="text"
                                        placeholder="<?php echo app('translator')->getFromJson('login.fName'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-1">
                                    <h4 class="grey3">&nbsp;</h4>
                                    <div class="icon pt-2"><img src="assets/imgs/account/lang.svg"></div>
                                </div>
                                <div class="col-11">
                                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.nationality'); ?></h4>
                                    <select class="form-control loginInput" name="nationality" id="nationality" required>
                                        <option value=""><?php echo app('translator')->getFromJson('login.nationality'); ?></option>
                                        <?php $__currentLoopData = $nationalitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($nationality->id); ?>">
                                                <?php if(app()->getLocale() == 'ar'): ?>
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
                                <div class="col-1">
                                    <h4 class="grey3">&nbsp;</h4>
                                    <div class="icon pt-2"><i class="fas fa-calendar-alt"
                                            style="color: #0de0fe; font-size: x-large;"></i></div>
                                </div>
                                <div class="col-11">
                                    <h4 class="grey3"><?php echo app('translator')->getFromJson('login.birthdate'); ?></h4>
                                    <input class="form-control datetimepicker" type="text" id="datetimepickerDate1" value=""
                                        name="birthdate" data-toggle="datetimepicker" data-target="#datetimepickerDate1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group card-label">
                            <h4><?php echo app('translator')->getFromJson('login.gender'); ?></h4>
                            <div class="form-check-inline">
                                <label class="gender-radio">
                                    <input class="form-check-input" type="radio" value="Male"
                                        name="gender"><?php echo app('translator')->getFromJson('login.male'); ?>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="gender-radio">
                                    <input class="form-check-input" type="radio" value="Female"
                                        name="gender"><?php echo app('translator')->getFromJson('login.female'); ?>
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <?php if($errors->has('gender')): ?>
                                <span class="help-block">
                                    <strong style="color: #FF0000;"><?php echo e($errors->first('gender')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group card-label">
                            <h4 class="grey3"><?php echo app('translator')->getFromJson('login.relation'); ?></h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="friend"
                                                name="relation"><?php echo app('translator')->getFromJson('login.friend'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="brother"
                                                name="relation"><?php echo app('translator')->getFromJson('login.brother'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" value="wife" type="radio"
                                                name="relation"><?php echo app('translator')->getFromJson('login.wife'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="husband"
                                                name="relation"><?php echo app('translator')->getFromJson('login.husband'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="son"
                                                name="relation"><?php echo app('translator')->getFromJson('login.son'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="daughter"
                                                name="relation"><?php echo app('translator')->getFromJson('login.daughter'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="father"
                                                name="relation"><?php echo app('translator')->getFromJson('login.father'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label gender-radio">
                                            <input class="form-check-input" type="radio" value="mother"
                                                name="relation"><?php echo app('translator')->getFromJson('login.mother'); ?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block btn-md login-btn" type="submit"><?php echo app('translator')->getFromJson('login.addf'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end flollowerModal-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('views.client.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/client/followers.blade.php ENDPATH**/ ?>