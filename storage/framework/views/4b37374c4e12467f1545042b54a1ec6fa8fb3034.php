

<?php if(isset($tasks)): ?>

    <?php $__env->startSection('title','تعديل العرض'); ?>

<?php endif; ?>

<?php $__env->startSection('title','اضافة العرض'); ?>

<?php $__env->startSection('content'); ?>

<?php $status=""; 


?>




    <?php if(isset($tasks) &&!empty($tasks)): ?>
        
   

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-content collapse show">

                            <div class="card-body">

                                <form enctype="multipart/form-data" id="offer_form" action="<?php echo e(route('updateorder', $tasks->id)); ?>" class="form ls_form validate_form" method="post">

                                    <?php echo e(csrf_field()); ?>


                                    <?php echo e(method_field('PUT')); ?>


                                    <div class="form-body">

                                        <h4 class="form-section"><i class="la la-paperclip"></i> تعديل الحجز</h4>
                                        
                                        
                                         <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               رقم الموعد

                                            </label>

                                            <input type="text" id="link" disabled class="form-control " name="dates" value="<?php echo e($tasks->id); ?>" autofocus disabled>

                                           </div>

                                      <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">اسم المراجع</label>
                                            <select class="form-control loginInput form-control-lg" name="dentist"
                                                    id="dentist" required disabled>
                                                <option value="">اسم المراجع</option>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($tasks->user_id == $user['id'] ?'selected="selected"':""); ?> value="<?php echo e($user['id']); ?>">
                                       
                                            <?php echo e($user['name']); ?>                         
                                        </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('dentist')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('dentist')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>

                                        <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الامراض 

                                            </label>

                                            <input type="text" id="link"  class="form-control " name="diseases" value="<?php echo e($tasks->diseases=="" ?"لا يوجد" :$tasks->diseases); ?>" autofocus >

                                           </div>
                                          
                                           <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الادوية 

                                            </label>
                                             

                                            <input type="text" id="link"  class="form-control " name="drug" value="<?php echo e($tasks->drug=="" ?"لا يوجد" :$tasks->drug); ?>" autofocus >

                                           </div>
                                           
                                             <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الملاحظات 

                                            </label>
                                             

                                            <input type="text" id="link"  class="form-control " name="description" value="<?php echo e($tasks->description=="" ?"لا يوجد" :$tasks->description); ?>" autofocus >

                                           </div>

                                      <?php if($tasks->status=="5" || $tasks->status=="3" ): ?>
                                        
                                          <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الطبيب</label>
                                            <select class="form-control loginInput form-control-lg" name="dentist"
                                                    id="dentist" required disabled>
                                                <option value="">الطبيب</option>
                                                <?php $__currentLoopData = $dentists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dentist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($tasks->dentist_id == $dentist['id'] ?'selected="selected"':""); ?> value="<?php echo e($dentist['id']); ?>">
                                       
                                            <?php echo e($dentist['name']); ?> -- <?php echo e($dentist['hospital']); ?>                          
                                        </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('dentist')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('dentist')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>
                                        
                                        <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الموعد

                                            </label>

                                            <input type="date" id="link" disabled class="form-control " name="dates" value="<?php echo e($tasks->event_date); ?>" autofocus>

                                           

                                        </div>
                                        
                                        
                                             <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">
                                                الوقت
                                                   </label>
                                    <select disabled  class="form-control loginInput form-control-lg" name="event_time">
                                    	<option value="<?php echo e($tasks->start_time); ?>" ><?php echo e($tasks->start_time); ?></option>
                                    	
									<option value="08:00:00" >08:00:00</option>
									
										<option value="09:00:00" >09:00:00</option>
																	
									<option value="10:00:00">10:00:00</option>
																	
									<option value="13:00:00">13:00:00</option>
																	
									<option value="14:00:00">14:00:00</option>
									<option value="15:00:00">15:00:00</option>
									</select> 
                                    
									
									</select> 

                                           

        
                                        </div>
                                      
                                        
                                        <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الحالة</label>
                                            <select disabled class="form-control loginInput form-control-lg" name="status"
                                                    id="dentist" required>
                                              
                                                <?php echo $tasks->status ?>
                                                
                                             <?php if($tasks->status=="0")
                                                
                                                   $status="في الانتظار";

                                                elseif($tasks->status==1)
                                                
                                               $status="تم القبول من الطبيب";
                                                 
                                                 elseif($tasks->status==2)
                                               $status="تأكيد الحضور";
                                                elseif($tasks->status==5)
                                               $status="تأكيد الوصول";
                                                 elseif($tasks->status==3)
                                                 $status="ألغاء من الطبيب";
                                                 elseif($tasks->status==4)
                                                
                                                 $status="ألغاء من المريض";
                                                
                                                 elseif($tasks->status==8)
                                                $status="مؤجل الي بداية السمستر";
                                               ?>
                                                    <option viewonly value="<?php echo e($tasks->status); ?>"><?php echo $status ?></option>
                                                <option value="0">في الانتظار</option>
                                                  <option value="1">تم القبول من الطبيب</option>
                                                  <option value="2">تأكيد الحضور</option>
                                                  <option value="5">تأكيد الوصول</option>
                                                  
                                                  <option value="3">ألغاء من الطبيب</option>
                                                  <option value="4">ألغاء من المريض</option>
                                                  
                                                <option value="8">مؤجل الي بداية السمستر</option>
                                               
                                            </select>

                                          


                                        </div>
                                        
                                        
                                        
                                        
                                       <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الخدمة</label>
                                            <select disabled class="form-control loginInput form-control-lg" name="service"
                                                    id="dentist" required>
                                                <option value="">الخدمة</option>
                                                <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($tasks->treatment_id == $service->id ?'selected="selected"':""); ?> value="<?php echo e($service->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
                                                            <?php echo e($service->service_name_ar); ?>

                                                        <?php elseif( app()->getLocale()=='en'): ?>
                                                            <?php echo e($service->service_name_en); ?>

                                                        <?php endif; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                          


                                        </div>
                                        
                                        
                                       
                                      
 
                                        <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               1 الصورة

                                            </label>

                                     
<br/>
                                    

                                        <?php if($tasks->photo!=""): ?>
                                        <a href="<?php echo e(asset('/images/'.$tasks->photo)); ?>" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('/images/'.$tasks->photo)); ?>" alt="">
                                      </a>
                                     
                                         <?php endif; ?>  
                                          
                                          <input disabled type="file"   class="form-control" name="photo" >
                                   
                                        </div>
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               2 الصورة

                                            </label>
                                              <br/>

                                        <?php if($tasks->photo2!=""): ?>
                                           <a href="<?php echo e(asset('/images/'.$tasks->photo2)); ?>" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('/images/'.$tasks->photo2)); ?>" alt="">
                                            </a>
                                          <?php endif; ?>
                                          <input disabled type="file"   class="form-control" name="photo2" >
                                        
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               3 الصورة

                                            </label>
                                              <br/>

                                         <?php if($tasks->photo3!=""): ?>
                                            <a href="<?php echo e(asset('/images/'.$tasks->photo3)); ?>" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('/images/'.$tasks->photo3)); ?>" alt="">
                                      </a>
                                        <?php endif; ?>
                                          <input disabled type="file"   class="form-control" name="photo3" >
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               4 الصورة

                                            </label>
<br/>
                                         <?php if($tasks->photo4!=""): ?>
                                            <a href="<?php echo e(asset('/images/'.$tasks->photo4)); ?>" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('/images/'.$tasks->photo4)); ?>" alt="">
                                      </a>
                                        <?php endif; ?>
                                          <input disabled type="file"   class="form-control" name="photo4" >
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               5 الصورة

                                            </label><br/>

                                         <?php if($tasks->photo5!=""): ?>
                                            <a href="<?php echo e(asset('/images/'.$tasks->photo5)); ?>" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('/images/'.$tasks->photo5)); ?>" alt="">
                                      </a>
                                        <?php endif; ?>
                                          <input disabled type="file"   class="form-control" name="photo5" >
                                        </div>
 
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               ملاحظات خدمة العملاء

                                            </label>

                                             <textarea type="date" id="link" class="form-control " name="note"  autofocus><?php echo e($tasks->note); ?></textarea>
                                        </div>
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الخطة العلاجية

                                            </label>

                                             <textarea type="date" id="link" class="form-control " name="treatment"  autofocus><?php echo e($tasks->treatment); ?></textarea>

                                             <?php else: ?>
                                             
                                             <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الطبيب</label>
                                            <select class="form-control loginInput form-control-lg" name="dentist"
                                                    id="dentist" required>
                                                <option value="">الطبيب</option>
                                                <?php $__currentLoopData = $dentists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dentist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($tasks->dentist_id == $dentist['id'] ?'selected="selected"':""); ?> value="<?php echo e($dentist['id']); ?>">
                                       
                                            <?php echo e($dentist['name']); ?> -- <?php echo e($dentist['hospital']); ?>                          
                                        </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('dentist')): ?>
                                                <span class="help-block">
                                                    <strong style="color: #FF0000;"><?php echo e($errors->first('dentist')); ?></strong>
                                                </span>
                                            <?php endif; ?>


                                        </div>
                                        
                                        <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الموعد

                                            </label>

                                            <input type="date" id="link" class="form-control " name="dates" value="<?php echo e($tasks->event_date); ?>" autofocus>

                                           

                                        </div>
                                        
                                        
                                             <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">
                                                الوقت
                                                   </label>
                                    <select   class="form-control loginInput form-control-lg" name="event_time">
                                    	<option value="<?php echo e($tasks->start_time); ?>" ><?php echo e($tasks->start_time); ?></option>
									<option value="08:00:00" >08:00:00</option>
									
										<option value="09:00:00" >09:00:00</option>
																	
									<option value="10:00:00">10:00:00</option>
																	
									<option value="13:00:00">13:00:00</option>
																	
									<option value="14:00:00">14:00:00</option>
									<option value="15:00:00">15:00:00</option>
									</select> 

                                           

        
                                        </div>
                                      
                                        
                                        <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الحالة</label>
                                            <select class="form-control loginInput form-control-lg" name="status"
                                                    id="dentist" required>
                                              
                                                <?php echo $tasks->status ?>
                                                
                                             <?php if($tasks->status=="0")
                                                
                                                   $status="في الانتظار";

                                                elseif($tasks->status==1)
                                                
                                               $status="تم القبول من الطبيب";
                                                 
                                              
                                                 elseif($tasks->status==2)
                                               $status="تأكيد الحضور";
                                                elseif($tasks->status==5)
                                               $status="تأكيد الوصول";
                                                 elseif($tasks->status==3)
                                                 $status="ألغاء من الطبيب";
                                                 elseif($tasks->status==4)
                                                
                                                 $status="ألغاء من المريض";
                                                
                                                 elseif($tasks->status==8)
                                                $status="مؤجل الي بداية السمستر";
                                               ?>
                                                <option viewonly value="<?php echo e($tasks->status); ?>"><?php echo $status ?></option>
                                                 
                                                <option value="0">في الانتظار</option>
                                                  <option value="1">تم القبول من الطبيب</option>
                                                  <option value="2">تأكيد الحضور</option>
                                                  <option value="5">تأكيد الوصول</option>
                                                  
                                                  <option value="3">ألغاء من الطبيب</option>
                                                  <option value="4">ألغاء من المريض</option>
                                                  
                                                <option value="8">مؤجل الي بداية السمستر</option>
                                               
                                            </select>

                                          


                                        </div>
                                        
                                        
                                        
                                        
                                       <div class="form-group col-md-8">
                                            <label class=" col-form-label text-md-right"
                                                   for="nationality">الخدمة</label>
                                            <select class="form-control loginInput form-control-lg" name="service"
                                                    id="dentist" required>
                                                <option value="">الخدمة</option>
                                                <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($tasks->treatment_id == $service->id ?'selected="selected"':""); ?> value="<?php echo e($service->id); ?>"><?php if( app()->getLocale()=='ar'): ?>
                                                            <?php echo e($service->service_name_ar); ?>

                                                        <?php elseif( app()->getLocale()=='en'): ?>
                                                            <?php echo e($service->service_name_en); ?>

                                                        <?php endif; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                          


                                        </div>
                                        
                                        
                                       
                                      
 
                                        <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               1 الصورة

                                            </label>

                                     
<br/>
                                    

                                        <?php if($tasks->photo!=""): ?>
                                        <a href="<?php echo e(asset('/images/'.$tasks->photo)); ?>" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('/images/'.$tasks->photo)); ?>" alt="">
                                      </a>
                                    <a style="color:red" href="<?php echo e(url('home/orders/photo/photo/id/'.$tasks->id )); ?>">Delete</a>
                                         <?php endif; ?>  
                                          
                                          <input type="file"   class="form-control" name="photo" >
                                   
                                        </div>
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               2 الصورة

                                            </label>
                                              <br/>

                                        <?php if($tasks->photo2!=""): ?>
                                           <a href="<?php echo e(asset('/images/'.$tasks->photo2)); ?>" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('/images/'.$tasks->photo2)); ?>" alt="">
                                            </a>
                                        <a style="color:red" href="<?php echo e(url('home/orders/photo/photo2/id/'.$tasks->id )); ?>">Delete</a>
                                          <?php endif; ?>
                                          <input type="file"   class="form-control" name="photo2" >
                                        
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               3 الصورة

                                            </label>
                                              <br/>

                                         <?php if($tasks->photo3!=""): ?>
                                            <a href="<?php echo e(asset('/images/'.$tasks->photo3)); ?>" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('/images/'.$tasks->photo3)); ?>" alt="">
                                      </a>
                                       <a style="color:red" href="<?php echo e(url('home/orders/photo/photo3/id/'.$tasks->id )); ?>">Delete</a>
                                        <?php endif; ?>
                                          <input type="file"   class="form-control" name="photo3" >
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               4 الصورة

                                            </label>
<br/>
                                         <?php if($tasks->photo4!=""): ?>
                                            <a href="<?php echo e(asset('/images/'.$tasks->photo4)); ?>" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('/images/'.$tasks->photo4)); ?>" alt="">
                                      </a>
                                       <a style="color:red" href="<?php echo e(url('home/orders/photo/photo4/id/'.$tasks->id )); ?>">Delete</a>
                                        <?php endif; ?>
                                          <input type="file"   class="form-control" name="photo4" >
                                        </div>
                                        
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_en">

                                               5 الصورة

                                            </label><br/>

                                         <?php if($tasks->photo5!=""): ?>
                                            <a href="<?php echo e(asset('/images/'.$tasks->photo5)); ?>" target="_blank"> 
                                      <img class="img-thumbnail img-responsive" width="70" height="70" src="<?php echo e(asset('/images/'.$tasks->photo5)); ?>" alt="">
                                      </a>
                                       <a style="color:red" href="<?php echo e(url('home/orders/photo/photo5/id/'.$tasks->id )); ?>">Delete</a>
                                        <?php endif; ?>
                                          <input type="file"   class="form-control" name="photo5" >
                                        </div>
 
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               ملاحظات خدمة العملاء

                                            </label>

                                             <textarea type="date" id="link" class="form-control " name="note"  autofocus><?php echo e($tasks->note); ?></textarea>
                                        </div>
                                        
                                          <div class="form-group col-md-8">

                                            <label for="offer_name_ar">

                                               الخطة العلاجية

                                            </label>

                                             <textarea type="date" id="link" class="form-control " name="treatment"  autofocus><?php echo e($tasks->treatment); ?></textarea>

                                           <?php endif; ?>

                                        </div>

 
                                    </div>

                                    <div class="form-actions text-center">

                                        <button type="submit" class="btn btn-primary  box-shadow-1 ml-1">تعديل</button>

                                        <a  href="<?php echo e(route('showoffer')); ?>" class="btn btn-warning box-shadow-1 mr-1"> <i class="ft-x"></i>

                                            عوده

                                        </a> </div>

                                </form>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dentist/public_html/resources/views/backstage/orders/edit.blade.php ENDPATH**/ ?>