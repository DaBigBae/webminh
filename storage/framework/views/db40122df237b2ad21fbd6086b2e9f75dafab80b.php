<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/icons/favicon.ico')); ?>"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/fonts/iconic/css/material-design-iconic-font.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/animate/animate.cssbower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/css-hamburgers/hamburgers.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/animsition/css/animsition.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/select2/select2.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/daterangepicker/daterangepicker.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/util.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/main.css')); ?>">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <?php if(Session::has('msg')): ?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" >x</button>
                    <strong><?php echo e(Session::get('msg')); ?></strong>
                </div>
            <?php endif; ?>

            <?php if(count($errors) > 0 || session('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($err); ?><br/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form class="login100-form validate-form" action="<?php echo e(route('ad.checklogin')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

					<span class="login100-form-title p-b-26">
						Welcome
					</span>
                <span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

                    <a class="txt2" href="#">
                        Sign Up
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?php echo e(asset('assets/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('assets/vendor/animsition/js/animsition.min.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('assets/vendor/bootstrap/js/popper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('assets/vendor/select2/select2.min.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('assets/vendor/daterangepicker/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/daterangepicker/daterangepicker.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('assets/vendor/countdowntime/countdowntime.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

</body>
</html>