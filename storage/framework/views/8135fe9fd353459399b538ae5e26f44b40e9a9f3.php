<?php $__env->startSection('title'); ?>
    <title>Check out</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/checkout.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/all.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!-- Product Detail -->
    <section class="bgwhite p-t-40 p-b-40 p-l-75 p-r-75">
        <div class="row">
            <div class="col-50 bo9 flex-sb bgwhite">
                <div class="container m-b-30">
                    <form id="ordered" action="<?php echo e(route('index.checkout.ordered')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class=" m-l-r-auto m-t-30">
                            <h3 class="m-text20 p-b-24">Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <span id="error_name" class="error">This field is required</span>
                            <div class="size1 bo4 m-r-10 ">
                                <?php if(Auth::guard('user')->user() != null): ?>
                                <input id="fname" name="name" value="<?php echo e(Auth::guard('user')->user()->name); ?>" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="John M. Doe">
                                    <?php else: ?>
                                    <input id="fname" name="name" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                           placeholder="John M. Doe">
                                <?php endif; ?>
                            </div>
                            <label for="email"><i class="fa fa-envelope m-t-20"></i> Email</label>
                            <span id="error_email" class="error">A valid email address is required</span>
                            <div class="size1 bo4 m-r-10">
                                <?php if(Auth::guard('user')->user() != null): ?>
                                    <input id="email" name="email" value="<?php echo e(Auth::guard('user')->user()->email); ?>" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                           placeholder="john@example.com">
                                <?php else: ?>
                                    <input id="email" name="email" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                           placeholder="john@example.com">
                                <?php endif; ?>

                            </div>
                            <label for="adr"><i class="fa fa-address-card-o m-t-20"></i> Address</label>
                            <span id="error_address" class="error">A valid address is required</span>
                            <div class="size1 bo4 m-r-10 ">
                                <?php if(Auth::guard('user')->user() != null): ?>
                                    <input id="adr" name="address" value="<?php echo e(Auth::guard('user')->user()->address); ?>" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                           placeholder="542 W. 15th Street">
                                <?php else: ?>
                                    <input id="adr" name="address" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                           placeholder="542 W. 15th Street">
                                <?php endif; ?>

                            </div>
                            <label for="city"><i class="fa fa-institution m-t-20"></i> City</label>
                            <span id="error_city" class="error">This field is required</span>
                            <div class="size1 bo4 m-r-10">
                                <input id="city" name="city" class="sizefull s-text7 p-l-22 p-r-22" type="text"
                                       placeholder="New York">
                            </div>

                            <div class="row">
                                <div class="col-50">
                                    <label class="m-t-20" for="state">Country</label>
                                    <span id="error_country" class="error">This field is required</span>
                                    <div class="size1 bo4 m-r-10">
                                        <input id="country" name="country" class="sizefull s-text7 p-l-22 p-r-22"
                                               type="text"
                                               placeholder="United States">
                                    </div>
                                </div>
                                <div class="col-50">
                                    <label class="m-t-20" for="phone">Phone</label>
                                    <span id="error_phone" class="error">A valid phone is required</span>
                                    <div class="size1 bo4 m-r-10">

                                        <?php if(Auth::guard('user')->user() != null): ?>
                                            <input id="phone" name="phone" value="<?php echo e(Auth::guard('user')->user()->phone); ?>" class="sizefull s-text7 p-l-22 p-r-22"
                                                   type="text"
                                                   placeholder="036871654">
                                        <?php else: ?>
                                            <input id="phone" name="phone" class="sizefull s-text7 p-l-22 p-r-22"
                                                   type="text"
                                                   placeholder="036871654">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label class="m-t-20 s-text13">
                            <input type="checkbox" class="m-t-20 icheckbox_flat-green " checked="checked"
                                   > Shipping address
                            same as billing
                        </label>
                        <div class="size15 trans-0-4">
                            <!-- Button -->
                            <input type="submit" value="Continue to checkout"
                                   class="submit_btn button flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-5"></div>
            <div class="col-45 flex-sb bgwhite bo9" style="height: 80%">
                <div class="container m-b-30 m-t-30 ">
                    <h4 class=" m-text20">Cart <span class="price m-text20" style="color:black"><i
                                    class="fa fa-shopping-cart"></i> <b><?php if(session('cart')): ?> <?php echo e(count(session('cart'))); ?> <?php else: ?>
                                    0 <?php endif; ?></b></span>
                    </h4>
                    <?php $total = 0; $count = 0 ?>
                    <ul class="header-cart-wrapitem">
                        <?php if(session('cart')): ?>
                            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $total += $details['price'] * $details['quantity'];$count++; ?>
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="<?php echo e($details['img_link']); ?>" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="<?php echo e(route('index.productDetail.get',[$details['id']])); ?>"
                                           class="header-cart-item-name">
                                            <?php echo e($details['name']); ?>

                                        </a>

                                        <span class="header-cart-item-info">
											<?php echo e($details['quantity']); ?> x $ <?php echo e($details['price']); ?>

										</span>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </ul>
                    <hr>
                    <?php $discount = 0; $shipCost = 15;$isFixesCost = true?>

                    <p class="m-text19">Sub Total: <span class="price m-text19"><b class="total">$<?php echo e($total); ?></b></span></p>
                    <p class="m-text19">Discount: <span class="price m-text19"><b class="total">
                                <?php if(session('coupon')): ?>
                                    <?php $discount = session()->get('coupon')['discount'];
                                    if(session()->get('coupon')['type'] == 0){
                                        $symbol = "%";
                                        $isFixesCost = false;
                                    }
                                    else{
                                        $symbol = "$";
                                        $isFixesCost = true;
                                    }
                                    ?>
                                    <?php echo e($symbol); ?><?php echo e($discount); ?>

                                <?php else: ?>
                                    $<?php echo e($discount); ?>

                                <?php endif; ?>
                            </b></span></p>
                    <p class="m-text19">Ship: <span class="price m-text19"><b class="total">$<?php echo e($shipCost); ?></b></span></p>
                    <p class="m-text19">Total: <span class="price m-text19"><b class="total">
                                <?php if($isFixesCost): ?>
                                    $<?php echo e($total - $discount+ $shipCost); ?>

                                <?php else: ?>
                                    $<?php echo e($total*((100-$discount)/100) + $shipCost); ?>

                                <?php endif; ?></b></span></p>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script>
        $(function () {
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })
        })
    </script>
    <script type="text/javascript">
        $("form").submit(function (e) {
            if ($('.total').text() == "$0") {
                e.preventDefault();
                swal("Your cart is empty", "You must add products to cart before checking out !", "warning");
                return false;
            }else{
                var form_data = $("#ordered").serializeArray();
                var error_free = true;
                for (var input in form_data) {
                    var element = $("[name='"+form_data[input]['name']+"']");
                    if(element!=null && form_data[input]['name'] != "_token" ){
                        var valid = element.parent().hasClass("bo4");
                    }
                    var error_element = $("#error_"+form_data[input]['name']);
                    if (!valid && form_data[input]['name'] != "_token") {
                        error_free = false;
                        if(error_element != null){
                            error_element.removeClass("error").addClass("error_show");
                        }
                    }
                    else {
                        error_element.removeClass("error_show").addClass("error");
                    }
                }
                if (!error_free) {
                    e.preventDefault();
                    return false;
                }
            }
        })
        $(document).ready(function () {

            if($('#fname').val()){
                $('#fname').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#fname').parent().removeClass("bo4").addClass("invalid");
            }
            // Name can't be blank
            $('#fname').on('input', function () {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            // Email must be an email
            $('#email').on('input', function () {
                var input = $(this);
                var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                var is_email = re.test(input.val());
                if (is_email) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            if($('#email').val()){
                $('#email').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#email').parent().removeClass("bo4").addClass("invalid");
            }
            // Address can't be blank
            $('#adr').on('input', function () {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            if($('#adr').val()){
                $('#adr').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#adr').parent().removeClass("bo4").addClass("invalid");
            }
            // City can't be blank
            $('#city').on('input', function () {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            if($('#city').val()){
                $('#city').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#city').parent().removeClass("bo4").addClass("invalid");
            }
            // Country can't be blank
            $('#country').on('input', function () {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            if($('#country').val()){
                $('#country').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#country').parent().removeClass("bo4").addClass("invalid");
            }
            // Phone can't be blank
            $('#phone').on('input', function () {
                var input = $(this);
                var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
                var is_phone = numberRegex.test(input.val());
                if (is_phone) {
                    input.parent().removeClass("invalid").addClass("bo4");
                }
                else {
                    input.parent().removeClass("bo4").addClass("invalid");
                }
            });
            if($('#phone').val()){
                $('#phone').parent().removeClass("invalid").addClass("bo4");
            }
            else {
                $('#phone').parent().removeClass("bo4").addClass("invalid");
            }
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("index.layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>