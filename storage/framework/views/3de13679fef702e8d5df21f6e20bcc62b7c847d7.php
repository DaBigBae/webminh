<?php $__env->startSection('title'); ?>
    <title>Login</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
             style="background-image: url('<?php echo e(asset('/images/product_background.jpg')); ?>'); background-position: center; ">
        <h2 class="l-text1 t-center" style="color: #1a2226">
            Login
        </h2>
    </section>

    <section class="bgwhite p-t-40 p-b-40 p-l-75 p-r-75">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="pos-relative">
                        <img class="img-fluid" src="<?php echo e(asset('\images\login.jpg')); ?>" alt="Alt">
                        <div class="sizefull ab-t-l flex-col-c-m">
                            <h4 class="m-text4 t-center w-size3 p-b-8" style="color: white">
                                Sign up & get 20% off
                            </h4>

                            <p class="t-center w-size18" style="color: floralwhite">
                                Be the frist to know about the latest watch news and get exclu-sive offers
                            </p>
                            <div class="w-size2 p-t-25">
                                <!-- Button -->
                                <a href="<?php echo e(route('index.register.get')); ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    Create Account
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 bo9 flex-sb bgwhite" >
                    <div class="m-b-20">
                        <h3 class="m-text20 text-center p-b-24 p-t-24">Login</h3>
                        <form class="row m-b-20" action="<?php echo e(route('index.checkLogin')); ?>" method="post" id="contactForm">
                            <?php echo e(csrf_field()); ?>

                            <label for="fname"><i class="fa fa-user m-l-100"></i> Email</label>
                            <div class="size1 bo4 m-l-100 m-r-100 ">
                                <input id="fname" name="email" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="Email">
                            </div>

                            <label for="fname"><i class="fa fa-lock m-t-20 m-l-100"></i> Password</label>
                            <div class="size1 bo4 m-l-100 m-r-100 ">
                                <input id="fname" name="password" class="sizefull s-text7 p-l-22 p-r-22" type="password"
                                       placeholder="Password">
                            </div>

                            <label class=" m-l-100 s-text13">
                                <input type="checkbox" class="m-t-20 icheckbox_flat-green " checked="checked">
                                Keep me logged in
                            </label>

                            <div class="size15 m-l-100 m-r-100 trans-0-4">
                                <!-- Button -->
                                <input type="submit" value="Login"
                                       class="submit_btn button flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                <a href="#">Forgot password?</a>
                            </div>

                            <div class="size15 m-t-50 m-l-100 m-r-100 trans-0-4">
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
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("index.layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>