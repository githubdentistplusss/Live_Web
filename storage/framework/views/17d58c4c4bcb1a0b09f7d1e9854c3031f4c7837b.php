<?php $__env->startSection('content'); ?>
<!-- Main Content-->
     <main class="main-content">
      <!--aboutUs section-->
      <section class="account">
        <div class="title">
          <div class="container">
            <h2><?php echo app('translator')->getFromJson('home.about'); ?></h2>
          </div>
        </div>
        <div class="container">
          <div class="content">
            <div class="row">
              <div class="col-md-4">
                <div class="aboutImg"><img src="<?php echo e(asset('assets/imgs/aboutus/dental.png')); ?>"></div>
              </div>
              <div class="col-md-8">
                <p><?php if( app()->getLocale()=='ar'): ?>
          
          قال تعالى ( فَمَنْ يَعْمَلْ مِثْقَالَ ذَرَّةٍ خَيْرًا يَرَهُ ) ( سورة الزلزلة / الآية 7 )
صدق الله العظيم
<br><br>
تُعدّ الخدمة الاجتماعية من أهمّ المِهن على الإطلاق؛حيث يكتسب الفرد عدّة مهارات عديدة  و يتعزّز إنتماؤه للمجتمع المحليّ والإنساني، وسيمتلك روح العمل التعاوني ، وتمنحه القدرة على تحمّل المسؤولية، وتؤكّد على قيم العمل والوقت والنظام، وتحثّ الفرد على جعل تفكيره أكثر واقعية، وتزيد من قدرته على حلّ المشاكل بتفكير واعٍ وسليم، وتزيد من المهارات الفكرية.
<br><br>
مرضى الأسنان عددهم كبير (حيث بلغت  نسبة التسوس في المملكة لعمر 6 سنوات 96% و لعمر 12 سنة 93.6%) إحصائية 1439هـ، وللأسف كثير من مرضى الأسنان ليس لديهم علم بعيادات الأسنان المتوفرة بجامعات الاسنان والتي يصل عددها في الجامعة الواحدة إلى أكثر من 200 عيادة أسنان عامة وتخصصية ، مما استدعى إلى تزاحم المرضى في عيادات الأسنان التخصصية  و العامة .
<br><br>
و من هذا المنطلق و إيجاد حلقة و صل بين أطباء الأسنان الدارسين بجامعات الأسنان الذي يبلغ عددهم في 2018م إلى أكثر من 12488 موزعين على 27 كلية طب أسنان (19 جامعة حكومية، 8 جامعات خاصة) و تسهيل مسيرتهم العلمية بعلاج عدد معين من حالات الأسنان، و كذلك تسهيلا للمرضى لتلقي علاج الأسنان.
<br><br>
فلذلك تم و لله الحمد إعداد برنامج طبيب أسنان+ليقدم خدماته لكافة شرائح المجتمع و جميع الجنسيات و مختلف الأعمار و التخصصات (حشوات أسنان، تركيبات ثابتة و متحركة، علاج  عصب و جذور الاسنان، و علاج اللثة, أسنان الأطفال، جراحة الأسنان).
<br><br>
مع تمنياتنا لكم بدوام الصحة و العافية


					<?php elseif( app()->getLocale()=='en'): ?>
            
            قال تعالى ( فَمَنْ يَعْمَلْ مِثْقَالَ ذَرَّةٍ خَيْرًا يَرَهُ )       (سورة الزلزلة / الآية 7 ) صدق الله العظيم. 
            <br><br>
            Social service is one of the most    important occupations of all time, where the individual acquire several skills and strengthens his belonging to the community and humanitarian, and will have the spirit of cooperative work, and give him the ability to take responsibility, and emphasizes the values of work, time ,order, and urges the individual to make his thinking more realistic, and increase his ability to solve   problems with creative  thinking and sound, and increase intellectuality and skills.
 <br><br>
There are a large number of dental patients (where the percentage of caries in the Kingdom for the age of 6 years 96% and for the age of 12 years 93.6%) statistic 1439AH, and unfortunately many dental patients are not aware of dental clinics available in dental universities, which number in the university to more than 200 clinics General and specialized dentistry, which led to contention of patients in specialized and public dental clinics.
From this standpoint, we found a link between the dentist studying in dental university (in 2018 more than 12,488)distributed in 27 dentistry faculties (19 government, 8 private) and facilitate their scientific career by treating a certain number of dental cases, as well as to facilitate for patients to receive dental treatment.
<br><br>
Therefore, we have prepared a Dentist Pluss services to provide all       segments of society, all nationalities and   different ages and disciplines (dental fillings, fixed and removable prosthetics, root canal treatment, scaling and polishing, pediatric dentistry and dental surgery).

					<?php endif; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="aboutTitle"><?php echo app('translator')->getFromJson('about.about1'); ?></h3>
              </div>
                    <div class="col-md-4 about"><i class="far fa-calendar-alt"></i>
                      <h4><?php echo app('translator')->getFromJson('about.about2'); ?> !</h4>
                    </div>
                    <div class="col-md-4 about"><i class="fas fa-map-marker-alt"></i>
                      <h4><?php echo app('translator')->getFromJson('about.about3'); ?> !</h4>
                    </div>
                    <div class="col-md-4 about"><i class="far fa-clock"></i>
                      <h4><?php echo app('translator')->getFromJson('about.about4'); ?> !</h4>
                    </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- End Main Content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bsamat/public_html/demo/dentistplus/resources/views/frontend/about.blade.php ENDPATH**/ ?>