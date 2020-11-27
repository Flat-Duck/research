<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ethereal - Free Responsive HTML5 Website Template</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="css/animate.css"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,100,200,300,500,600,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body  id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="main-header" id="main-header">
  <nav class="navbar mynav navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="#"><img style="width: 100px;margin: -20px;" src="./images/logo.png" ></a> </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#banner">الرئيسية</a></li>
          <li><a href="{{ route('search') }}">إبحث</a></li>
          <li><a href="/admin">تسجيل الدخول</a></li>
          <li><a href="#testimonials">عن الموقع</a></li>
          <li><a href="#about">من نحن</a></li>
          <li><a href="#contact">الخصوصية</a></li>
          <li><a href="#contact">أتصل بنا</a></li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<div class="banner" id="banner">
  <div class="bg-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-text">
            <h2>اهلا بكم في <span>الهيئة الوطنية للتعليم التقني والفني</span> </h2>
            <!-- <p>One of the most beautiful HTML5 template designed by W3Template.com</p>  -->
            <a href="{{ route('search') }}" class="banner-button">إبحث الان</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="features">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="feature-box media">
          <div class="icon-box text-center pull-left media-object"> <i class="icon-bulb"></i> </div>
          <div class="feature-text media-body">
            <h2>سهولة التكامل مع تكنولوجيا المعلومات</h2>
            <p class="feature-detail">
              تم تصميم موقع إدارة البحوث خصيصًا لإدارة المصادقة وحسابات المستخدمين. 
بمجرد إعداد حسابات المستخدمين توفر الوحة معلومات واجهة مستخدم سريعة الاستجابة وبديهية تدير هؤلاء المستخدمين ثم توفر التحكم في المعلومات التي يمكنهم الوصول إليها.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="feature-box media pull-left">
          <div class="icon-box text-center pull-left media-object"> <i class="icon-eye"></i> </div>
          <div class="feature-text media-body">
            <h2>اسم مستخدم واحد وكلمة مرور</h2>
            <p class="feature-detail">
               يمكن للمشتركين تسجيل الدخول والوصول إلى المعلومات التي يبحثون عنها دون عوائق أو تعقيدات غير ضرورية.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="feature-box media pull-left">
          <div class="icon-box text-center pull-left media-object"> <i class="icon-heart"></i> </div>
          <div class="feature-text media-body">
            <h2>حقوق الوصول والأذونات</h2>
            <p class="feature-detail">
              يوفر الموقع تحكمًا مرنًا لإدارة حقوق الوصول لمجموعات المستخدمين. 
 يمكن لمدير المعرفة التحكم في الوصول إلى موارد محددة بناءً على متطلبات الترخيص.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="feature-box media pull-left">
          <div class="icon-box text-center pull-left media-object"> <i class="icon-heart"></i> </div>
          <div class="feature-text media-body">
            <h2>التعليم</h2>
            <p class="feature-detail">
              تم تطوير الدخول الفردي في العالم الأكاديمي.	
              أدى الوصول إلى مجموعة من موارد التعلم إلى تطوير الحاجة إلى مجموعة واحدة من بيانات الاعتماد التي تبسط الوصول والمصادقة للبحوث العلمية وكذلك الموظفين والطلاب.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Portfolio -->
<div id="work" class="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3>الخصوصية</h3>
        <h4>بعض الأسئلة التي قد يرغب منا بعض المستخدمين الإجابة عنها </h4>
      </div>
      <div class="col-md-12">
        <div class="about-text ">
          <h4 class="text-right">كيف حصلنا على معلوماتك؟</h4>
          <p class="text-right">
            ربما تكون قد قدمت لنا بياناتك الشخصية بنفسك. على سبيل المثال ، ربما تكون قد  راسلتنا عبر البريد الإلكتروني لطلب معلومات حتى تتمكن من تنزيل تقرير أو مستند أو بعض المعلومات الأخرى
           </p>
          <p class="text-right">
            ربما وجدنا تفاصيل الاتصال الخاصة بك في بعض المصادر المتاحة للجمهور ولكن في هذه الحالة ، لن نستخدمها دون موافقتك
          </p>
          <p class="text-right">
            قد تكون المنظمة التي تعمل بها قد أعطتنا بياناتك الشخصية
          </p>
          <h4 class="text-right">ما هي المعلومات التي نقوم بجمعها؟</h4>
          <p class="text-right">
            إذا كنت أحد مستخدمي الموقع ، فربما طلبت منا مؤسستك إنشاء حساب لك. للقيام بذلك ، نحتاج فقط إلى اسمك وعنوان بريدك الإلكتروني
           </p>
          <p class="text-right">
            نقوم بتشفير هذه المعلومات حتى لا نكشف عن هويتك إذا أنشأت مؤسستك الأكاديمية حساب لك ، فسيختارون المعلومات التي يجب جمعها والمعلومات التي يجب الكشف عنها لزائرين
           </p>
          <h4 class="text-right">ماذا نفعل بمعلوماتك؟</h4>
          <p class="text-right">
            إذا كنت من مستخدمي الموقع وكنا مسؤولين عن إنشاء حسابك ، فإننا نجعل بياناتك الشخصية مجهولة ولا نبيع أو نشارك بياناتك الشخصية مع أي طرف ثالث
           </p>
          <h4 class="text-right">إلى متى نحتفظ بمعلوماتك؟</h4>
          <p class="text-right">
            • سنحتفظ بمعلوماتك الشخصية حتى تخبرنا مؤسستك الأكاديمية بعدم القيام بذلك.
           </p>
          <h4 class="text-right">كيف يمكنك التحقق من المعلومات الخاصة بك؟</h4>
          <p class="text-right">
            • يسعدنا أن تتحقق من المعلومات التي لدينا عنك في أي وقت. يمكنك أن تقوم بالتواصل معنا  لإخبارك بالمعلومات التي لدينا ، وكيف نحميها وما إلى ذلك. يمكنك أيضًا التحقق من دقة معلوماتك وسنقوم بإجراء أي تصحيحات على الفور. 
           </p>
          <p class="text-right">
            • يرجى ملاحظة أنه إذا كنت أحد مستخدمين يتم التواصل مع جهة الاتصال المعينة لمؤسستك ، فنحن ملزمون بالتواصل معهم قبل حذف معلوماتك . هذا لأنهم هم المتحكمون في البيانات لمعلوماتك ، على سبيل المثال ، قد تحتاج مؤسستك منا لاستبدال تفاصيل الاتصال بشخص آخر قبل أن نحذف بياناتك.
           </p>
        </div>
      </div>
    </div>
  </div>
        <!-- 
  <div class="container">
      <div class="row">
      <div class="col-lg-10 col-lg-offset-1 text-center text">
        <h3>Our Work</h3>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="portfolio-item"> <a href="#"> <img class="img-portfolio img-responsive" src="images/portfolio-1.jpg"> </a> </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="portfolio-item"> <a href="#"> <img class="img-portfolio img-responsive" src="images/portfolio-2.jpg"> </a> </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="portfolio-item"> <a href="#"> <img class="img-portfolio img-responsive" src="images/portfolio-3.jpg"> </a> </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="portfolio-item"> <a href="#"> <img class="img-portfolio img-responsive" src="images/portfolio-4.jpg"> </a> </div>
          </div>
        </div>
        
        <a href="#" class="view-more">View More Items</a> </div>
    
    </div>
  
  </div>
  --> 
</div>
<div class="testimonials" id="testimonials">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <h3>الاعلانات</h3>
        </div>
      </div>
      <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
        <div id="owl-demo" class="owl-carousel owl-theme test">
            @foreach ($ads as $ad)
            <div class="item">
                <p><sup><i class="fa fa-quote-left"></i></sup>{{ $ad->description }}<sup><i class="fa fa-quote-right"></i></sup></p>
                <div class="test-img"> <img src="images/team-img-03.jpg"/>
                  <p><strong>{{ $ad->date }}</strong></p>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<div class="call-to-action">
  <div class="call-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-10">
          <div class="subscribe-text">
            <h3>Subscribe For Updates</h3>
            <p>Join our 1000+ subscribers and get access to the latest tools, freebies, product announcements and much more!</p>
          </div>
        </div>
        <div class="col-md-4 text-center"> <a href="#" class="subscribe-button">Subscribe Now</a> </div>
      </div>
    </div>
  </div>
</div>
<div class="about" id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3>مهمتنا</h3>
      </div>
      <div class="col-md-12">
        <div class="about-text text-center">
          <p>نحن موجودون لإزالة الحواجز أمام المعرفة وربط الناس بالمعلومات.
            نسعى جاهدين لتحسين تجربة المستخدم النهائي للطلاب والمستفيدين والموظفين.
            </p>
        </div>
      </div>
        <div class="col-md-12 text-center">
          <h3>رؤيتنا</h3>
        </div>
        <div class="col-md-12">
          <div class="about-text text-center">
            <p>
              إبراز دور الباحثين من  مختلف التخصصات ، الهدف هو إنشاء رحلة مستخدم نهائي سلسة للأشخاص الذين يصلون إلى الموارد الأكاديمية المحمية بكلمة مرور.
            </p>
          </div>
        </div>
      <!-- <div class="col-md-6">
        <div class="col-md-6 col-sm-6 col-xs-6 block">
          <div class="counter-item text-center">
            <h5>Our Clients</h5>
            <div class="timer" data-from="0" data-to="55" data-speed="5000" data-refresh-interval="50"></div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="counter-item text-center">
            <h5>Projects completed</h5>
            <div class="timer" data-from="0" data-to="88" data-speed="5000" data-refresh-interval="50"></div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
<div class="contact" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <h3>أتصل بنا</h3>
        </div>
      </div>
      <!-- <div class="col-md-7 col-sm-offset-0 col-sm-6 col-xs-offset-1 col-xs-10">
        <div class="contact-form">
          <form role="form">
            <div class="col-md-6">
              <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="col-md-12">
              <textarea class="form-control" placeholder="Message" rows="6"></textarea>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit" class="contact-button">Send Message</button>
            </div>
          </form>
        </div>
      </div> -->
      <div class="col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-1 col-xs-10">
        <div class="address">
          <h4>العنوان</h4>
          <p>طرابلس , قرجي,<br>
          <div class="email"><i class="fa fa-at"></i>govser@gmail.com<br>
            <i class="fa fa-mobile"></i>0914256886/0219885489</div>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4"> <span class="copyright">Copyright &copy; Ethereal 2018</span> </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li><a href="#"><i class="fa fa-twitter"></i></a> </li>
          <li><a href="#"><i class="fa fa-facebook"></i></a> </li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a> </li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="list-inline quicklinks">
          <li>Designed by <a href="http://w3template.com">W3 Template</a> </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="js/jquery.countTo.js"></script> 
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script> 
<script>
$(document).ready(function() {
     
      $("#owl-demo").owlCarousel({
     
          navigation : false, // Show next and prev buttons
          slideSpeed : 500,
		  autoPlay : 3000,
          paginationSpeed : 400,
          singleItem:true
     
          // "singleItem:true" is a shortcut for:
          // items : 1, 
          // itemsDesktop : false,
          // itemsDesktopSmall : false,
          // itemsTablet: false,
          // itemsMobile : false
     
      });
     
    });

	/*$('.timer').each(count);*/
	jQuery(function ($) {
      // custom formatting example
      $('.timer').data('countToOptions', {
        formatter: function (value, options) {
          return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
        }
      });


  // start all the timers
      $('#testimonials').waypoint(function() {
    $('.timer').each(count);
	});
 
      function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
      }
    });


	$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

  // Prevent default anchor click behavior
  //event.preventDefault();

  // Store hash
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 900, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;
    });
  });
})
</script>
</body>
</html>
