<style>
    .social-icon {
        
        margin: 35px;
    }
    
    .dropbtn {
  
  color: black;
   
  
   min-width: 160px;
   
   padding:16px;
   
   
  font-size: 16px;
  
}

.dropup {
  position: relative;
  display: inline-block;
}

.dropup-content {
  display: none;
  position: absolute;
  box-shadow: 2 2px 0px rgb(0 0 0 / 30%);
   border-top-left-radius: 4px;
    border-top-right-radius: 4px;
  background-color: white;
  min-width: 160px;
  bottom: 56.5px;
  border:1px #ddd solid;
  z-index: 1;
}

.dropup-content a {
  color: black;
  padding: 9px 9px;
    text-align: right;
  text-decoration: none;
  display: block;
}

.dropup-content a:hover {
    
    background-color: #ccc
   
    
}

.dropup:hover .dropup-content {
  display: block;
}

.dropup:hover .dropbtn {
  box-shadow: 0 1px 5px rgb(0 0 0 / 30%);
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
 
}
  
</style>
    <!-- Footer -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        
  function test(x)
{
   
  event.preventDefault();

 swal({
  title: "تنبيه",
  text: "هل تريد حجز هذا العرض",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      var f = '#f'+x;
      
     $(f).submit();
  } 
});
}
        
    </script>
    
    <footer class="footer">

     

        <!-- Footer Bottom -->
        
      
        
        <div class="customfoot" style="background-color:white;padding:0.01%;border:1px #ddd solid" >
            
            <center>
            <div class="row" >
                
                <div class="col-lg-4 col-md-4">
                    <div class="dropup">
                        <div class="dropbtn">المستخدمين 
                        </div>
                   <div class="dropup-content">
                        @if (!isset(Auth::guard('client')->user()->id))
                               <a href="cLogin">تسجيل دخول</a>
                               <a href="registerClient">تسجيل حساب جديد</a> 
                               
                               @else
                               
                               <a href="UAReservation">مواعيدي</a>
                               
                               @endif
                              
  </div>
                </div>
                </div>
                
                    <div class="col-lg-4 col-md-4">
                    <div class="dropup">
                        <div class="dropbtn">
                       طلاب طب الاسنان
                        
                        </div>
                   <div class="dropup-content">
                        @if (!isset(Auth::guard('dentist')->user()->id))
                               <a href="dLogin">تسجيل دخول</a>
                               <a href="registerCreate">تسجيل حساب جديد</a>
                                @else
                               <a href="dUAReservation">مواعيدي</a>
                                @endif
  </div>
                </div>
                </div>
                
                
                
               <div class="col-lg-4 col-md-4">
                    <div style="width:350px" class="dropup">
                         <div  class="dropbtn">اتصل بنا  
                        </div>
                     
                   <div style="width:350px;border:1px #ddd solid" class="dropup-content">
  <a href=""> <i class="fas fa-map-marker-alt"></i>
                             المملكة العربية السعودية - المنطقة الشرقية <br> الدمام - شارع الأمير نايف بن عبدالعزيز  
                               </a>
                                
                              <a href=""> 
                                   <i class="fas fa-phone-alt"></i>  966580580373+
                                </a>
                                
                                   <a href=""> 
                                   <i class="fas fa-envelope"></i> info@dentistpluss.net
                               </a>
  </div>
                </div>
                </div>
                    
               
                
                
            </div>
            </center>
            
            
        </div>
        
        <div class="footer-bottom">
            <div class="container-fluid">

                <!-- Copyright -->
                <div style="padding:15px" class="copyright">
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div style="text-align:center" class="copyright-text">
                                <p class="mb-0">&copy; جميع الحقوق محفوظة لمؤسسه اسنان بلس 2021 </p>
                            </div>
                        </div>
                          <div class="col-md-4 col-lg-4">
                       
                                             <div style="color:white">
                                                 
                                                 <center>
                                 
                                            <a style="color: #fff;
    font-size: 20px;
    transition: all 0.4s ease 0s;" href="https://www.facebook.com/DentistPlussss" target="_blank"><i  class="fab fa-facebook-f"></i> </a>
                                       
                                       
                                            <a style="color: #fff;
    font-size: 20px;
    transition: all 0.4s ease 0s;" href="https://twitter.com/DentistPluss?s=09" target="_blank"><i class="fab fa-twitter"></i> </a>
                                      
                                   
                                       
                                            <a style="color: #fff;
    font-size: 20px;
    transition: all 0.4s ease 0s;" href="https://www.instagram.com/dentistpluss/?igshid=1h88hojeuh3i7" target="_blank"><i class="fab fa-instagram"></i></a>
                                       </center>
                                       </div>
                             
                                 </div>
                        <div class="col-md-4 col-lg-4">

                            <!-- Copyright Menu -->
                            <div class="copyright-menu">
                                <ul style="text-align:center" class="policy-menu">
                                    <li><a href="{{ Route('terms') }}">الشروط والأحكام</a></li>
                                    <li><a href="{{ Route('PrivacyPolicy') }}">السياسه والخصوصيه</a></li>
                                </ul>
                            </div>
                            <!-- /Copyright Menu -->

                        </div>
                    </div>
                </div>
                <!-- /Copyright -->

            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    
    
    <!-- /Footer -->
