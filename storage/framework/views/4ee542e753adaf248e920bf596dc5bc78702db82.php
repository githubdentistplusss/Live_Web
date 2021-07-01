<?php $__env->startSection('title','Orders'); ?>

<?php $__env->startSection('content'); ?>



<?php 



if(isset($_GET['from']))
{
  $from=$_GET['from'];  
}
else
{
    $from="yyyy/mm/dd";  
}

if(isset($_GET['to']))
{
  $to=$_GET['to'];  
}
else
{
    $to="yyyy/mm/dd";  
}

?>






    <?php if(isset($objects)): ?>
    
    

        <div class="container">

            <div class="row">
                
                

                <div class="col-md-12">
 
                    <div class="card">
                        
                        

                        <div class="card-header">

                            <div class="heading-elements">
                              
                                 <div>Reservations</div>
                                   
                            </div>
                            <br>
                            
                            

                        </div>

                        <div class="card-content collapse show">
                            
                              <form action="<?php echo e(url('home/orders/search/')); ?>" method="get">
                                  
                                  
                                        
                                        <div style="margin-left:25%;margin-top:2%">
                                        <span>From:  <input type="date"  id="from" value="<?php echo e($from); ?>" name="from" required></span>
                            
                          
                                
                     <span>To:  <input type="date" id="to" value="<?php echo e($to); ?>"  name="to" required></span>
                                            
                                            
                                            <button type="submit">Search</button></div>
                                            
                               
                                    </form>

                            <div class="card-body">

                                <!--Table Wrapper Start-->

                                <div class="table-responsive ls-table">
                                    
                                    

                                    <table id="myTable" class="display" style="width:100%,z-index:9999">
                                        
                                             
                                   
                                          
                                        <thead>

                                        <tr>

<th>#</th>
<th>Hospital ID</th>
<th>Patient</th>
<th>Mobile</th>
<!--  <th>Follower Mobile</th>-->
<th> Dentist </th>
<th>Treatment</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Photo?</th>
<th> Created </th>
<th>Details</th>                                        </tr>

                                        </thead>

<tbody>

<?php if(($objects)): ?>


    <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>

            <td><?php echo e($object->id); ?></td>
            <td> #<?php echo e($object->hospital_id); ?>#</td>
            <td>
                <?php if(!empty($user[$i]->name)): ?>
                  <?php echo e($user[$i]->name); ?>

                <?php endif; ?>
                <?php if($object->follower_id !=""): ?>
                <b color="red">
                     (تابع) </b>
                <?php endif; ?>
                </td>
                <td>
                <?php if(!empty($user[$i]->mobile)): ?>
                  <?php echo e($user[$i]->mobile); ?>

                <?php endif; ?>
                 
                <?php if(!empty($user[$i]->user_id)): ?>
                  <?php echo e($user[$i]->user->mobile); ?>

                <?php endif; ?>
                </td>

                <td> <?php if(!empty($dentist[$i]->name)): ?>
                  <?php echo e($dentist[$i]->name); ?>

                <?php endif; ?></td>

                <td><?php echo e($treatments[$i]->service_name_ar); ?></td>

            <td>
                <?php echo e($object->event_date); ?>

            </td>

            <td>
                <?php echo e(date("g:ia", strtotime($object->start_time))); ?>

              
            </td>
            <td>
            <?php if($object->status=="0"): ?>
                <?php echo app('translator')->getFromJson('resrv.satus0'); ?>
            <?php elseif($object->status=="1"): ?>
                <?php echo app('translator')->getFromJson('resrv.satus1'); ?>
            <?php elseif($object->status=="2"): ?>
                <?php echo app('translator')->getFromJson('resrv.satus2'); ?>
            <?php elseif($object->status=="3"): ?>
                <?php echo app('translator')->getFromJson('resrv.satus3'); ?>
            <?php elseif($object->status=="4"): ?>
                <?php echo app('translator')->getFromJson('resrv.satus4'); ?>
            <?php elseif($object->status=="5"): ?>
                <?php echo app('translator')->getFromJson('resrv.satus5'); ?>
           <?php elseif($object->status=="6"): ?>
                <?php echo app('translator')->getFromJson('resrv.satus6'); ?>
           <?php elseif($object->status=="7"): ?>
                <?php echo app('translator')->getFromJson('resrv.satus7'); ?>
           <?php elseif($object->status=="8"): ?>
                <?php echo app('translator')->getFromJson('resrv.satus8'); ?>
                 
            <?php endif; ?>
            </td>
            
            <td>
        <?php if($object->photo==""): ?>
        <span style="color:red" ><b>No </b></span>
        <?php else: ?>
        <span >Yes</span>
        <?php endif; ?>
                
            </td>
            <td>
            <?php echo e($object->created_at); ?>

            </td>
             
            <td>
               
                
             <a href="<?php echo e(url('home/orders/edit/'.$object->id )); ?>">Edit</a> 
            </td>
            
           

        </tr>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>

    <tr>

        <td colspan="7">لا يوجد مواعيد محجوزة</td>

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



    <?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/backstage/orders/index.blade.php ENDPATH**/ ?>