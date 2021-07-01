
<?php $__env->startSection('innercontent'); ?>
<div class="card">
    <div class="card-body pt-0">

        <!-- Tab Menu -->
        <nav class="user-tabs mb-4">
            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" href="#dentist_dashboard"
                        data-toggle="tab"><?php echo app('translator')->getFromJson('resrv.dashboard'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="<?php echo e(route('upcommingAcceptedReservation')); ?>"><?php echo app('translator')->getFromJson('resrv.uADate'); ?></a>
                </li>
             
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('prevReservationD')); ?>""><?php echo app('translator')->getFromJson('resrv.pDate'); ?></a>
                    </li>
                </ul>
        </nav>
        <!-- /Tab Menu -->

            <!-- Tab Content -->
            <div class=" tab-content pt-0">

                <!-- Dashboard Tab -->
                <div id="dentist_dashboard" class="tab-pane fade show active">
                    <div class="card p-4">
                        <div class="row">
                            <div class="col-3 col-md-2 col-lg-1">
                                <div class="icon"><img
                                        src="assets/imgs/reserve/broken-tooth.svg"></div>
                            </div>
                            <div class="col-9 col-md-10 col-lg-11">
                                <h5 class="grey3"> <?php echo app('translator')->getFromJson('mesg.calander'); ?></h5>
                                <div class="h4 blue2">
                                    <div class="button no-btn"> <a
                                            href="<?php echo e(url('add_calander')); ?>"><?php echo e($services); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">

                        <div class="collapse" id="collapseThree" aria-labelledby="headingThree"
                            data-parent="#accordion">
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
                                    <div class="icon"><img src="assets/imgs/account/social.svg">
                                    </div>
                                </div>
                                <div class="col-9 col-md-10 col-lg-11">
                                    <h5 class="title"><?php echo app('translator')->getFromJson('resrv.social'); ?></h5>
                                    <div class="row">
                                        <div class="list-group list-group-horizontal-xl">
                                            <li class="list-group-item" style="border: none"><a href="#"><img
                                                        src="assets/imgs/account/Snapchat.svg"></a>
                                            </li>
                                            <li class="list-group-item" style="border: none"><a href="#"><img
                                                        src="assets/imgs/account/Facebook.svg"></a>
                                            </li>
                                            <li class="list-group-item" style="border: none"><a href="#"><img
                                                        src="assets/imgs/account/Twitter.svg"></a>
                                            </li>
                                            <li class="list-group-item" style="border: none"><a href="#"><img
                                                        src="assets/imgs/account/Instagram.svg"></a>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="collapseFour" aria-labelledby="headingFour"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 col-md-2 col-lg-1"></div>
                                    <div class="col-9 col-md-10 col-lg-11">
                                        <div class="row">
                                            <div class="col-2 col-md-1"><img
                                                    src="assets/imgs/account/Snapchat.svg">
                                            </div>
                                            <div class="col-8 col-md-11">
                                                <input class="loginInput form-control"
                                                    placeholder="your account">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2 col-md-1"><img
                                                    src="assets/imgs/account/Facebook.svg">
                                            </div>
                                            <div class="col-8 col-md-11">
                                                <input class="loginInput form-control"
                                                    placeholder="your account">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2 col-md-1"><img
                                                    src="assets/imgs/account/Twitter.svg"></div>
                                            <div class="col-8 col-md-11">
                                                <input class="loginInput form-control"
                                                    placeholder="your account">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2 col-md-1"><img
                                                    src="assets/imgs/account/Instagram.svg">
                                            </div>
                                            <div class="col-8 col-md-11">
                                                <input class="loginInput form-control"
                                                    placeholder="your account">
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
                                    <div class="icon"><img src="assets/imgs/account/social.svg">
                                    </div>
                                </div>
                                <div class="col-9 col-md-10 col-lg-11">
                                    <h5 class="grey3"><?php echo app('translator')->getFromJson('resrv.socialShare'); ?></h5>
                                    <div class="row">
                                        <div class="list-group list-group-horizontal-xl">
                                            <li class="list-group-item" style="border: none"><a href="#" onclick="fbShare();"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <li class="list-group-item" style="border: none"><a href="#" onclick="twtShare();"><i
                                                        class="fab fa-twitter"></i></a></li>
                                            <li class="list-group-item" style="border: none"><a href="#" onclick="whatsappShare();"><i
                                                        class="fab fa-whatsapp"></i></a>
                                            </li>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Dashboard Tab -->


    </div>
    <!-- Tab Content -->
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('views.dentist.dentist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/views/dentist/dashboard.blade.php ENDPATH**/ ?>