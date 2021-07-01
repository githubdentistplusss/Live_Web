<style>
    .info-box {
        display: block;
        min-height: 90px;
        background: #fff;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        border-radius: 2px;
        margin-bottom: 15px;
        
    }
    
    .bg-aqua {
        background-color: #00c0ef !important;
        color: #fff !important;
     }
     
     .bg-red {
      background-color: #dd4b39 !important;
      color: #fff !important;
     }
     
     .bg-green{
         background-color: #00a65a !important;
         color: #fff !important;
     }
     
     .bg-yellow{
         background-color: #f39c12 !important;
         color: #fff !important

     }
     
    .info-box-content {
        padding: 5px 10px;
        margin-left: 90px;
    }
     
    .info-box-icon {
        border-top-left-radius: 2px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 2px;
        display: block;
        float: left;
        height: 90px;
        width: 90px;
        text-align: center;
        font-size: 45px;
        line-height: 90px;
        background: rgba(0,0,0,0.2);
}

}

</style>

<?php $__env->startSection('content'); ?>

   <div class="row" style="padding:10px">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="m-menu__link-icon flaticon-layers" style="font-size: 5.3rem;margin-top:10px"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Services </span>
              <span class="info-box-number"><?php echo e($service); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="m-menu__link-icon flaticon-share" style="font-size: 5.3rem;margin-top:10px"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Hospitals</span>
              <span class="info-box-number"><?php echo e($hospital); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class=" m-menu__link-icon flaticon-interface-1" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dentists</span>
              <span class="info-box-number"><?php echo e($dentist); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__link-icon flaticon-calendar" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dentist Calender</span>
              <span class="info-box-number"><?php echo e($dentist_calander); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        
        <?php $__currentLoopData = $gender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__link-icon flaticon-calendar" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dentist <?php echo e($g->gender); ?></span>
              <span class="info-box-number"> <?php echo e($g->total); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php $__currentLoopData = $dgree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__link-icon flaticon-calendar" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Education Year <?php echo e($d->dgree); ?></span>
              <span class="info-box-number"> ( <?php echo e($d->total); ?>)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
                
        <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__link-icon flaticon-calendar" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">City <?php echo e(App\City::find($c->city_id)['city_name_en']); ?></span>
              <span class="info-box-number"> ( <?php echo e($c->total); ?>)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__item  m-menu__item--submenu" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Saudi Patients</span>
              <span class="info-box-number"><?php echo e($usersSud); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        
                <?php $__currentLoopData = $gendePation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gP): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__link-icon flaticon-calendar" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Patients <?php echo e($gP->gender); ?></span>
              <span class="info-box-number"> <?php echo e($gP->total); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__item  m-menu__item--submenu" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">not Sudi Patients</span>
              <span class="info-box-number"><?php echo e($usersnotSud); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        
                <?php $__currentLoopData = $cityPation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cP): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__link-icon flaticon-calendar" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">City Patients <?php echo e(App\City::find($cP->city_id)['city_name_en']); ?></span>
              <span class="info-box-number"> ( <?php echo e($cP->total); ?>)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
        
        <?php $__currentLoopData = $eventHospital; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
                <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__link-icon flaticon-calendar" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Order Hospital <?php echo e(App\Hospital::find($eh->hospital_id)['hospital_name_en']); ?></span>
              <span class="info-box-number"> ( <?php echo e($eh->total); ?>)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__link-icon flaticon-calendar" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Offers</span>
              <span class="info-box-number"><?php echo e($offer); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="m-menu__link-icon flaticon-network" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Orders</span>
              <span class="info-box-number"><?php echo e($order); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        
         <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class=" m-menu__link-icon flaticon-interface-1" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pending reservation </span>
              <span class="info-box-number"><?php echo e($pending); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        
         <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class=" m-menu__link-icon flaticon-interface-1" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Upcoming reservation</span>
              <span class="info-box-number"><?php echo e($upcoming); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        
         <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class=" m-menu__link-icon flaticon-interface-1" style="font-size: 5.3rem"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Previous reservation</span>
              <span class="info-box-number"><?php echo e($prev); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/freedentist/resources/views/home.blade.php ENDPATH**/ ?>