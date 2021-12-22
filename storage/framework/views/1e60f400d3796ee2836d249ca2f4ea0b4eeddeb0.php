<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel Login</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('backend/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('backend/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/css/login.css')); ?>" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <?php if(count($errors) >0): ?>
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="text-danger"> <?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                                <?php if(session('status') && session('status') == 'success'): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(session('message')); ?>

                                    </div>
                                <?php elseif(session('status') && session('status') == 'failed'): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session('message')); ?>

                                    </div>
                                <?php endif; ?>
                                <form class="user" method="POST" action="<?php echo e(route('backend.login.post')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                                <!--
                                <?php if(config('settings.social_login')): ?>
                                    <?php if(config('settings.facebook_login')): ?>
                                        <div class="input-group social-login mt-3 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fab fa-facebook"></i>
                                                </span>
                                            </div>
                                            <button data-action="social-login" data-service="facebook" class="btn btn-primary form-control" aria-label="Input group example" aria-describedby="btnGroupAddon1"><i class="fab fa-facebook"></i> Login with Facebook</button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(config('settings.google_login')): ?>
                                        <div class="input-group social-login mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-google"></i></span>
                                            </div>
                                            <button data-action="social-login" data-service="google" class="btn btn-danger form-control" aria-label="Input group example" aria-describedby="btnGroupAddon2"><i class="fab fa-google"></i> Login with Google</button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(config('settings.twitter_login')): ?>
                                        <div class="input-group social-login">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                            </div>
                                            <button data-action="social-login" data-service="twitter" class="btn btn-info form-control" aria-label="Input group example" aria-describedby="btnGroupAddon2"><i class="fab fa-twitter"></i> Login with Twitter</button>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                -->
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?php echo e(route('backend.forgot-password')); ?>">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('backend/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo e(asset('backend/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
<script>
    var social_redirect = '<?php echo e(route('frontend.auth.login.socialite.redirect', ['service' => ':service'])); ?>';
</script>
<!-- Custom scripts for login page -->
<script src="<?php echo e(asset('backend/js/login.js')); ?>"></script>
</body>
</html><?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views/backend/login.blade.php ENDPATH**/ ?>