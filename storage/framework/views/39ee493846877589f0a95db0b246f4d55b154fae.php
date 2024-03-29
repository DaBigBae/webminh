<?php $__env->startSection('title'); ?>
    <title>Cart</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
             style="background-image: url('<?php echo e(asset('/images/product_background.jpg')); ?>'); background-position: center; ">
        <h2 class="l-text1 t-center" style="color: #1a2226">
            Cart
        </h2>
    </section>

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container" id="cart-content">
        <?php $total = 0 ?>
            <!-- Cart item -->
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-2">Product</th>
                            <th class="column-3">Price</th>
                            <th class="column-4 p-l-70">Quantity</th>
                            <th class="column-5">Total</th>
                        </tr>
                        <?php if(session('cart')): ?>
                            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $total += $details['price'] * $details['quantity'] ?>
                                <tr class="table-row">
                                    <td class="column-1">
                                        <div data-for="<?php echo e($id); ?>" class="remove-from-cart cart-img-product b-rad-4 o-f-hidden">
                                            <img src="<?php echo e($details['img_link']); ?>" alt="IMG-PRODUCT">
                                        </div>
                                    </td>
                                    <td class="column-2"><?php echo e($details['name']); ?></td>
                                    <td class="column-3">$<?php echo e($details['price']); ?></td>
                                    <td class="column-4">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>

                                            <input class="size8 m-text18 t-center num-product" type="number"
                                                   name="<?php echo e($id); ?>" value="<?php echo e($details['quantity']); ?>">

                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td id="<?php echo e($id); ?>" class="price column-5">$<?php echo e($details['price'] * $details['quantity']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
            <?php if(!session('coupon')): ?>
                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                <div class="flex-w flex-m w-full-sm">
                    <div class="size11 bo4 m-r-10">
                        <input class="coupon-code sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code"
                               placeholder="Coupon Code">
                    </div>

                    <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                        <!-- Button -->
                        <button class=" apply-coupon flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Apply coupon
                        </button>
                    </div>
                </div>

                <div class="size10 trans-0-4 m-t-10 m-b-10">
                    <!-- Button -->
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Update Cart
                    </button>
                </div>
            </div>
            <?php else: ?>
                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        <div class="size11 bo4 m-r-10">
                            <input class="coupon-code sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" disabled value="<?php echo e(session()->get('coupon')['name']); ?>"
                                   placeholder="Coupon Code">
                        </div>

                        <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                            <!-- Button -->
                            <button class=" apply-coupon remove-coupon flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Remove coupon
                            </button>
                        </div>
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Update Cart
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Total -->
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <h5 class="m-text20 p-b-24">
                    Cart Totals
                </h5>

                <!--  -->
                <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

                    <span id="subtotal" class="m-text21 w-size20 w-full-sm">
						$<?php echo e($total); ?>

					</span>
                </div>
            <?php $discount = 0; $isFixesCost = true;
                ?>
                <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Discount:
					</span>


                    <span id="subtotal" class="m-text21 w-size20 w-full-sm">

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
					</span>
                </div>

                <!--  -->
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>
                    <?php $shipCost = 15; ?>
                    <div class="w-size20 w-full-sm">
                        <p class="s-text20 p-b-23">
                            Normal method: $<?php echo e($shipCost); ?>

                        </p>
                        
                            
                            
                        

                        
							
						

                        
                            
                                
                                
                                
                                
                            
                        

                        
                            
                                   
                        

                        
                            
                                   
                        

                        
                            
                            
                                
                            
                        
                    </div>
                </div>

                <!--  -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

                    <span id="total" class="m-text21 w-size20 w-full-sm">
                        <?php if($isFixesCost): ?>
						    $<?php echo e($total - $discount+ $shipCost); ?>

                        <?php else: ?>
                            $<?php echo e($total*((100-$discount)/100) + $shipCost); ?>

                        <?php endif; ?>
					</span>
                </div>

                <div class="size15 trans-0-4">
                    <!-- Button -->
                    <a href="<?php echo e(route('index.checkout.get')); ?>" class=" button flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Proceed to Checkout
                    </a>
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
    
    
    <script type="text/javascript">
        $('.btn-num-product-down').on('click', function (e) {
            e.preventDefault();
            var numProduct = Number($(this).next().val());
            if (numProduct > 1) $(this).next().val(numProduct - 1);
            var id = $(this).next().attr("name");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "<?php echo e(route('index.cart.update')); ?>",
                type: "patch",
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN, id: id, quantity: Number($(this).next().val())},
                success: function (response) {
                    //alert(response[0]);
                    $("#"+id).text("$"+ response[0]);
                    $("#total").text("$"+response[1]);
                    $("#subtotal").text("$"+response[1]);

                    //window.location.reload();
                },
                error: function(xhr, textStatus, error){
                    alert(error + "\r\n" + xhr.responseText);
                },
            });
            return false;
        });
    </script>
    <script type="text/javascript">
        $('.btn-num-product-up').on('click', function(e){
            e.preventDefault();
            var numProduct = Number($(this).prev().val());
            $(this).prev().val(numProduct + 1);
            var id = $(this).prev().attr("name");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "<?php echo e(route('index.cart.update')); ?>",
                type: "patch",
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN, id: id, quantity: Number($(this).prev().val())},
                success: function (response) {
                    //alert(response[0]);
                    $("#"+id).text("$"+ response[0]);
                    $("#total").text("$"+response[1]);
                    $("#subtotal").text("$"+response[2]);

                    //window.location.reload();
                },
                error: function(xhr, textStatus, error){
                    alert(error + "\r\n" + xhr.responseText);
                },
            });
            return false;
        });
    </script>
    <script type="text/javascript">
        $('.remove-from-cart').on('click',function (e) {
            e.preventDefault();
            var ele = $(this);
            var nameProduct = $(this).parent().parent().find('.column-2').html();
            swal({
                title: "Are you sure?",
                text: nameProduct + " will be remove from cart !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo e(route('index.cart.remove')); ?>',
                            method: "DELETE",
                            data: {_token: CSRF_TOKEN, id: ele.attr("data-for")},
                            success: function (response) {
                                swal(nameProduct, "is removed !", "success")
                                    .then((value) => {
                                        window.location.reload();
                                    });

                            }
                        });
                    } else {

                    }
                });
        });
    </script>
    <script type="text/javascript">
        $('.apply-coupon').on('click',function (e) {
            e.preventDefault();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var code = $('.coupon-code').val();
            if(!$('.apply-coupon').hasClass("remove-coupon")){
                $.ajax({
                    url: "<?php echo e(route('index.checkCoupon')); ?>",
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN, code: code},
                    success: function (response) {
                        if(response=="applied"){
                            swal(code, "Applied", "success").
                            then((value) => {
                                $('.coupon-code').attr("disabled", "disabled");
                                $('.apply-coupon').text("Remove coupon");
                                $('.apply-coupon').addClass('remove-coupon');
                                window.location.reload();
                            });
                        }
                        else if(response=="not available"){
                            swal(code, "This Coupon is expired or not available right now", "warning");
                        }else{
                            swal(code, "This Coupon is not exist", "error");
                        }
                    },
                    error: function(xhr, textStatus, error){
                        alert(error + "\r\n" + xhr.responseText);
                    },
                });
            }else{
                $('.coupon-code').removeAttr('disabled').val("");
                $('.apply-coupon').text("Apply coupon");
                $('.apply-coupon').removeClass('remove-coupon');
                $.ajax({
                    url: "<?php echo e(route('index.removeCoupon')); ?>",
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN},
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function(xhr, textStatus, error){
                        alert(error + "\r\n" + xhr.responseText);
                    },
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("index.layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>