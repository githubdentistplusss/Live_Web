
    <?php
    if(isset(Auth::guard('dentist')->user()->id)){
        $count = Auth::guard('dentist')->user()->newThreadsCount();
    } if(isset(Auth::guard('client')->user()->id)){
        $count = Auth::guard('client')->user()->newThreadsCount();
    }
 
        $cssClass = $count == 0 ? 'hidden' : '';
    ?>

    <span id="unread_messages" class="label label-danger <?php echo e($cssClass); ?>"><?php echo e($count); ?></span>


<?php /**PATH /home/dentist/public_html/resources/views/messenger/unread-count.blade.php ENDPATH**/ ?>