<?php $__env->startSection('title'); ?>
    <title><?php echo e($product->name); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!-- Product Detail -->
    <?php
    if (isset($product))
        $id = $product->id;
    else
        $id = 0;
    ?>
    <div class="container bgwhite p-t-35 p-b-80">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>

                    <div class="slick3">
                        <div class="item-slick3" data-thumb="<?php echo e($product->img_link); ?>">
                            <div class="wrap-pic-w">
                                <img src="<?php echo e($product->img_link); ?>" alt="IMG-PRODUCT">
                            </div>
                        </div>
                        <?php if($product->img_list != null): ?>
                            <?php $segments = preg_split('/[\s]+/', $product->img_list ) ?>
                        <?php $__currentLoopData = $segments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item-slick3" data-thumb="<?php echo e($seg); ?>">
                            <div class="wrap-pic-w">
                                <img src="<?php echo e($seg); ?>" alt="IMG-PRODUCT">
                            </div>
                        </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <h4 class="product-detail-name m-text16 p-b-13">
                    <?php echo e($product->name); ?>

                </h4>

                
					
				
                <?php if($product->discount > 0): ?>
                    <span class="block2-oldprice m-text17 p-r-5" style="text-decoration: line-through; font-size: 25px">
										$<?php echo e($product->price); ?>

									    </span>

                    <span style="color: #e65540;" class="block2-newprice m-text17 p-r-5">
										$<?php echo e($product->price * (1-$product->discount)); ?>

									    </span>
                <?php else: ?>
                    <span class="m-text17">
										$<?php echo e($product->price); ?>

									    </span>
                <?php endif; ?>

                <p class="bo7 s-text8 p-t-10">

                </p>
                <div class="flex-w p-t-10">
                    <div class="w-size10 flex-m flex-w">
                        <span class="s-text13 m-r-35">Quantity</span>
                        <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                            </button>

                            <input class="size8 m-text18 t-center num-product" type="number"  name="num-product" value="1">

                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                        <span data-for="<?php echo e($product->stock); ?>" class="stock-product s-text13 m-r-35"><?php echo e($product->stock); ?> in stock</span>
                    </div>
                </div>

                <div class="flex-w p-t-10 p-b-10">
                    <div class="w-size10 flex-m flex-w">
                        <div class="m-r-20 flex-w btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                            <!-- Button -->
                            <button data-for="<?php echo e($product->id); ?>" class="btn-addcart2 flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Add to Cart
                            </button>
                        </div>
                        <div class="m-l-20 btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                            <!-- Button -->
                            <a href="<?php echo e(Route('index.cart.get')); ?>" class=" button flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Check Out
                            </a>
                        </div>
                    </div>
                </div>
                <!--  -->


                <!--  -->
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Description
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            <?php echo e($product->des); ?>

                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Additional information
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <div class="w-size10 bo7 flex-m flex-w size22 ">
                            <span class="m-text18 ">
                                Basic Info
                            </span>
                        </div>
                        <div class="w-size10 bo7 size22 flex-m flex-w m-t-1 m-b-1">
                            <div class="flex-w w-size19 trans-0-4 w-full-sm">
                                <span class="s-text13">
                                    Brand
                                </span>
                            </div>
                            <div class=" flex-w w-size20 trans-0-4 w-full-sm">
                                <span class="s-text13">
                                    <?php echo e($product->brand->name); ?>

                                </span>
                            </div>
                        </div>
                        <?php $__currentLoopData = $att_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="w-size10 bo7 size22 flex-m flex-w m-t-1 m-b-1">
                                <div class="flex-w w-size19 trans-0-4 w-full-sm">
                                <span class="s-text13">
                                    <?php echo e($key); ?>

                                </span>
                                </div>
                                <div class=" flex-w w-size20 trans-0-4 w-full-sm">
                                <span class="s-text13">
                                    <?php echo e($item); ?>

                                </span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Reviews (0)
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            No reviews
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Relate Product -->
    <section class="relateproduct bgwhite p-t-45 p-b-138">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Related Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-slick2 p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative ">
                                <img class="responsive-image img-thumbnail" src="<?php echo e($p->img_link); ?>" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button data-for="<?php echo e($p->id); ?>" class="btn-addcart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="block2-txt p-t-20">
                                <a href="<?php echo e(route('index.productDetail.get',[$p->id])); ?>" class="block2-name dis-block s-text3 p-b-5">
                                    <?php echo e($p->name); ?>

                                </a>
                                <span class="block2-price m-text6 p-r-5">
									$<?php echo e($p->price); ?>

								</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        });
    </script>
    <script type="text/javascript">
        $('.btn-num-product-up').on('click', function(e){
            e.preventDefault();
            var numProduct = Number($(this).prev().val());
            var stock = $('.stock-product').attr("data-for");
            if(numProduct < stock )
                $(this).prev().val(numProduct + 1);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("index.layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>