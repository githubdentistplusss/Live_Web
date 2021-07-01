<section class="doc_card" id="capture" style="display:none;">
      <div class="container">
      <div class="row">
                <div class="col-12 col-md-3">
                    <div class="logo">
                        <div class="text-center"><img src="<?php echo e(url('assets/imgs/home/logo.png')); ?>" alt="DR.Mohamed Ali"></div>
                        <div class="row apps">
                            <div class="col-6 mt-3 mb-3 text-center"><img src="<?php echo e(url('assets/imgs/home/app-store.jpg')); ?>"></div>
                            <div class="col-6 mt-3 mb-3 text-center"><img src="<?php echo e(url('assets/imgs/home/google-play.jpg')); ?>"></div>
                        </div>
                        <h5 class="text-center"><a href="#">www.dentistpluss.com</a></h5>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                <div class="table">
                        <table class="table-responsive-sm">
                    <tbody>
                        <tr class="name">
                            <td><?php echo e(Auth::guard('dentist')->user()->en_name); ?></td>
                            <td><?php echo e(Auth::guard('dentist')->user()->name); ?></td>
                        </tr>
                        <tr class="slog">
                            <td><?php echo e(Auth::guard('dentist')->user()->related_hospital->hospital_name_en); ?></td>
                            <td><?php echo e(Auth::guard('dentist')->user()->related_hospital->hospital_name_ar); ?> </td>
                        </tr>
                        <tr class="code">
                            <td>Code <span><?php echo e(Auth::guard('dentist')->user()->code); ?></span></td>
                            <td>الكود</td>
                        </tr>
                        <tr>
                            <td>Check Up</td>
                            <td>كشف</td>
                        </tr>
                        <tr>
                            <td>Dental Filings</td>
                            <td>حشوات</td>
                        </tr>
                        <tr>
                            <td>Root Canal Treatment</td>
                            <td>عصب أسنان</td>
                        </tr>
                        <tr>
                            <td>Dental Surgery ( Tooth Extraction )</td>
                            <td>جراحه أسنان ( خلع )</td>
                        </tr>
                        <tr>
                            <td>Teeth Cleaning and Polishing</td>
                            <td>تنظيف وتلميع أسنان ( علاج لثة )</td>
                        </tr>
                        <tr>
                            <td>Pediatric Dentistry</td>
                            <td>أسنان أطفال</td>
                        </tr>
                        <tr>
                            <td>Fixed Prosthesis</td>
                            <td>تركيبات ثابتة</td>
                        </tr>
                        <tr>
                            <td>Removable Prosthesis</td>
                            <td>تركيبات متحركة</td>
                        </tr>
                </table>
                </div>
                </div>
      </div>
    </div>
    <div class="footer">
        <h5>classic account</h5>
    </div>

    </section>
    <section style="display:none;">
    <img id="doc_card"  alt="<?php echo e(Auth::guard('dentist')->user()->name); ?>" src="<?php echo e(Auth::guard('dentist')->user()->card? 'storage/'.Auth::guard('dentist')->user()->card : ''); ?>">

    </section>


<?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/vendor/partials/doc_card.blade.php ENDPATH**/ ?>