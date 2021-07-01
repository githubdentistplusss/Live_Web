<?php if(!empty($dates)): ?>
    <?Php $allData = array();?>
    <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $startTime = strtotime($value->start_date);
        $endTime = date(strtotime($value->end_date));
        // $unixTimestamp1 = strtotime($value->start_date);
        // $unixTimestamp1=date('l', strtotime($value->start_date));
        // $unixTimestamp2=date('l', strtotime($value->end_date));
        //$thisDatex = array();
        for ($i = $startTime; $i <= $endTime; $i = $i + 86400) {
            $thisDate = date('l', $i);
            if ($thisDate == $value->day) {
                $thisDatex[] = date('Y-n-j', $i);

            }
        }


        $allData[] = $thisDatex;
        ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php  // $thisDatex="2019-8-21","2019-8-24","2019-7-27";

    echo json_encode($thisDatex); // print_r($allData) ;?>
<?php endif; ?>

<?php /**PATH /Users/shahin/Sites/dentist-backend/resources/views/ajax-date.blade.php ENDPATH**/ ?>