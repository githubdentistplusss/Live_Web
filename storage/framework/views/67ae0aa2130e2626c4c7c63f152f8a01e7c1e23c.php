

<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
      <td class="text-services" style="text-align: left; padding: 20px 30px;">
          <div class="heading-section">
            <h2 style="font-size: 22px;">الاسم</h2>
            <p><?php echo e($data->name); ?>.</p>
            <h2 style="font-size: 22px;">الجوال</h2>
            <p><?php echo e($data->mobile); ?>.</p>
            <h2 style="font-size: 22px;">البريد الالكتروني</h2>
            <p><?php echo e($data->email); ?>.</p>
          <h2 style="font-size: 22px;">محتوي الرسالة</h2>
          <p><?php echo e($data->message); ?>.</p>

          </div>
      </td>
    </tr>
  </table>
<?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/emails/contact.blade.php ENDPATH**/ ?>