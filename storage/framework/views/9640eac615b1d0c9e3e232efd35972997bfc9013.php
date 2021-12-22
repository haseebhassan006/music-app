<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo e(MetaTag::get('title')); ?></title>
    <?php echo MetaTag::tag('description'); ?>

    <?php echo MetaTag::tag('keywords'); ?>

    <?php echo MetaTag::get('image') ? MetaTag::tag('image') : ''; ?>

    <?php echo MetaTag::openGraph(); ?>

    <?php echo MetaTag::twitterCard(); ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="google-signin-client_id" content="<?php echo e(config('settings.google_client_id')); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  crossorigin="anonymous">    
    <link href="<?php echo e(asset('frontend/css/swiper-bundle.min.css')); ?>" rel="stylesheet">

    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.cdnfonts.com/css/dejavu-sans" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pridi:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arimo:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Trocchi:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- style css -->
    <link href="<?php echo e(asset('frontend/css/style.css')); ?>" rel="stylesheet">
    <style>
      .collapse.show {
        display: flex;
      }
    </style>
    <?php if(config('settings.captcha')): ?>
        <meta name="recaptcha-key" content="<?php echo e(config('settings.recaptcha_public_key')); ?>" />
        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(config('settings.recaptcha_public_key')); ?>"></script>
    <?php endif; ?>
    <script type="text/javascript">
        var GLOBAL = {
            disabled_registration: <?php echo e(intval(config('settings.disable_register'))); ?>

        };
    </script>
  </head>
  <body class="<?php if((isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] == 'true') || ! isset($_COOKIE['darkMode'])): ?> dark-theme <?php endif; ?> <?php if(env('MEDIA_AD_MODULE') == 'true'): ?> media-ad-enabled <?php endif; ?>">
    <!-- header Start-->
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2 col-md-15">
            <div class="logo">LOGO HERE</div>
          </div>
          <div class="col-md-4">
            <div class="scrh-bar">
              <input type="text" placeholder="Type your search query here" name="srch">
              <input type="submit" name="srch-btn" hidden>
            </div>
          </div>          
        </div>
      </div>
      
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-header pb-2">        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">COMMNITY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">PODCASTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">TRENDING</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">STORE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">BLOG</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">VIDEOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">ARTIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">USER</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">DATABASE</a>
            </li>        
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
    <!-- header end-->

    <!-- main Start-->
    <section class="start-section">
      <div class="container-fluid overling-sec">
        <div class="row">          
            <!-- navigation side-->
          <div class="col-md-2 col-md-15 nvi" id="sideMenu">
            <div class="side-bar">
              <ul>
                <li><a href=""> HOME </a></li>
                <li><a href="/discover"> DISCOVER </a></li>
                <li><a href="/community"> COMMNITY </a></li>
                <li><a href="/podcasts"> PODCASTS </a></li>
                <li><a href="/trending"> TRENDING </a></li>
                <li><a href="/store"> STORE </a></li>
                <li><a href="/radio"> RADIO </a></li>
                <li><a href="/blog"> BLOG </a></li>
                <li><a href="javascript:;"> VIDEOS </a></li>
                <li><a href="javascript:;"> EBOOKS </a></li>
                <li><a href="javascript:;"> ARTIST </a></li>
                <li><a href="javascript:;"> USER </a></li>
                <li><a href="javascript:;"> DATABASE </a></li>
              </ul>
            </div>
            <div class="btm-side-bar">
              <p><img src="<?php echo e(asset('frontend/img/plus-01.png')); ?>"></p>
              <button>CREATE PLAYLISTS</button>
              <p><a href="#">YOUR PLAYLISTS <i class="fa fa-angle-down"></i></a></p>
              <div class="row px-4">
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/001.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/002.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/003.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/004.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/005.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/006.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/007.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/008.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/009.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/009.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/006.png')); ?>">
                </div>
                <div class="col-md-4">
                  <img src="<?php echo e(asset('frontend/img/008.png')); ?>">
                </div>
              </div>
            </div>


          </div>     
          <!-- end naviagtion-->   


          <!-- right Section-->     
        <div class="col-md-10  col-md-30 right-sec p-0">
            <div id="main">
                <div id="page">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
      </div>
    </div>
      <!-- End Right Section-->   
    </section>


   
  <!-- Main JS File -->
  <script src="<?php echo e(asset('frontend/js/swiper-bundle.min.js')); ?>"></script>

  <!-- Main JS File -->
  <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Third-Party javascript -->
    <script>
        var payment_stripe_publishable_key = '<?php echo e(config('settings.payment_stripe_publishable_key')); ?>';
        var youtube_api_key = '<?php echo e(config('settings.youtube_api_key')); ?>';
        var youtube_search_endpoint = '<?php echo e(route('frontend.song.stream.youtube', ['id' => 'SONG_ID'])); ?>';
    </script>
    <script src="https://www.gstatic.com/firebasejs/6.1.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.1.0/firebase-database.js"></script>
    <script type="text/javascript">
        // Firebase Config
        var config = {
            apiKey: "<?php echo e(config('settings.firebase_api_key')); ?>",
            authDomain: "<?php echo e(config('settings.firebase_auth_domain')); ?>",
            databaseURL: "<?php echo e(config('settings.firebase_database_url')); ?>",
        };
        firebase.initializeApp(config);
    </script>
    <?php if(config('settings.payment_stripe')): ?>
        <script src="https://js.stripe.com/v3/" crossorigin="anonymous"></script>
    <?php endif; ?>

    <!-- polyfill for IE 11 only -->
    <script type="text/javascript">
        if(/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) {
            document.write('<script type="text/javascript" src="<?php echo e(asset('js/ie/functions.js')); ?>"><\/script><script type="text/javascript" src="<?php echo e(asset('js/ie/polyfill.min.js')); ?>"><\/script>');
        }
    </script>

    <script src="<?php echo e(asset('js/core.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/utils.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/history.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/route.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/common.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/account.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/comment.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/share.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/nowplaying.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/contextmenu.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/player.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/artist.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/payment.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/artistCore.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/uploadApp.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/cart.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('skins/default/js/custom.js?version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('embed/embed.js?skin=embedplayer10&icon_set=radius&version=' . env('APP_VERSION'))); ?>" type="text/javascript"></script>

    <?php if(config('settings.analytic_tracking_code')): ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', '<?php echo e(config('settings.analytic_tracking_code')); ?>', 'auto');
            ga('send', 'pageview');

        </script>
    <?php endif; ?>

  </body>
</html><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/index_latest.blade.php ENDPATH**/ ?>