<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" CONTENT="pwkbackoffice.com created by PT. Powerkerto Wahyu Keprabon.">
    <meta name="google-site-verification" content="doC9zcjTLw5ZpuBCzLvMNG7W6D88D-hl_VsYJyWQJJc"/>
    <meta name="keywords" content="pwkbackoffice">
    <meta name="author" content="PT. Powerkerto Wahyu Keprabon">
    <meta name="robots" content="noindex,nofollow">

    <title>Pwkbackoffice</title>

    <link rel="icon" href="img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assetslp/css/bootstrap.min.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="assetslp/fonts/line-icons.css">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="assetslp/css/slicknav.css">
    <!-- Off Canvas Menu -->
    <link rel="stylesheet" type="text/css" href="assetslp/css/menu_sideslide.css">
    <!-- Color Switcher -->
    <link rel="stylesheet" type="text/css" href="assetslp/css/vegas.min.css">
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="assetslp/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assetslp/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assetslp/css/responsive.css">

  </head>
  <body>

    <div class="bg-wraper overlay has-vignette">
      <div id="example" class="slider opacity-50 vegas-container" style="height: 983px;"></div>
    </div>

    <!-- Coundown Section Start -->
    <section class="countdown-timer">
      <div class="container">
        <div class="row text-center justify-content-center align-items-center">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="heading-count">
              <h1>WE ARE COMING FOR YOU</h1>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="justify-content-center">
              <h2 class="pb-3" style="color:white;">POWER<span style="color:#29BFFD">KERTO</span></h2>
            </div>
            <p>
            You have brains in your head. You have feet in your shoes. You can steer yourself any direction you choose.<br>
            You’re on your own. And you know what you know. And YOU are the one who’ll decide where to go…
            </p>
            <div class="button-group">
              <a href="{{ route('login') }}" class="btn btn-border rounded-pill" style="width:250px;">Login</a>
            </div>
            <!-- <div class="social mt-4">
              <a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
              <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
              <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
              <a class="google" href="#"><i class="lni-google-plus"></i></a>
            </div> -->
          </div>
        </div>
      </div>
    </section>

    <!-- Coundown Section End -->

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assetslp/js/jquery-min.js"></script>
    <script src="assetslp/js/popper.min.js"></script>
    <script src="assetslp/js/bootstrap.min.js"></script>
    <script src="assetslp/js/vegas.min.js"></script>
    <script src="assetslp/js/jquery.countdown.min.js"></script>
    <script src="assetslp/js/classie.js"></script>
    <script src="assetslp/js/jquery.nav.js"></script>
    <script src="assetslp/js/jquery.easing.min.js"></script>
    <script src="assetslp/js/wow.js"></script>
    <script src="assetslp/js/jquery.slicknav.js"></script>
    <script src="assetslp/js/main.js"></script>
    <script src="assetslp/js/form-validator.min.js"></script>
    <script src="assetslp/js/contact-form-script.min.js"></script>

    <script type="text/javascript">
      $("#example").vegas({
          timer: false,
          delay: 6000,
          transitionDuration: 2000,
          transition: "blur",
          slides: [
              { src: "assetslp/img/slide1.jpg" },
              { src: "assetslp/img/slide2.jpg" },
              { src: "assetslp/img/slide3.jpg" }
          ]
      });
    </script>

    <script src="/js/app.js"></script>

  </body>
</html>
