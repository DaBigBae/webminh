<?php $__env->startSection('title'); ?>
    <title>List of Coupon</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
    <!-- Checkbox-Type -->
    <link href="<?php echo e(asset('plugins/switchery/css/switchery.min.css')); ?>" rel="stylesheet"/>

    <link rel="stylesheet" href="<?php echo e(asset('plugins/switchery-master/dist/switchery.css')); ?>"/>
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/all.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Coupon
            <small>Management your coupons</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('ad.dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Coupon</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of coupons</h3>

                    </div>
                    <div class="form-group box-body">
                        <a href="<?php echo e(route('ad.coupon.form.get',['id'=>0])); ?>">
                            <button class="btn btn-default bg-green " data-style="expand-right">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>  Add coupon
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tb-Coupon" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i.'.'); ?></td>
                                    <td><?php echo e($detail->code); ?></td>
                                    <?php if($detail->type == 1): ?>
                                        <td>Fix cost</td>
                                    <?php else: ?>
                                        <td>Percent</td>
                                    <?php endif; ?>
                                    <td><?php echo e($detail->value); ?></td>
                                    <td><?php echo e($detail->startdate); ?></td>
                                    <td><?php echo e($detail->enddate); ?></td>
                                    <?php if($detail->status == 1): ?>
                                        <td>Used</td>
                                    <?php else: ?>
                                        <td>Available</td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?php echo e(route('ad.coupon.form.get',[$detail->id])); ?>"
                                           class="btn btn-icon bg-light-blue " title="Edit"> <i class="fa fa-pencil"></i></a>

                                        <button href="#"
                                           class="delete btn btn-icon bg-red " data-for="<?php echo e($detail->id); ?>" title="Delete"> <i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-ori'); ?>
    <!-- DataTables -->
    <script src="<?php echo e(asset('bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/switchery/js/switchery.min.js')); ?>"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>

    <script src="<?php echo e(asset('plugins/switchery-master/dist/switchery.js')); ?>"></script>
    <script>
        $(function () {
            $('#tb-Coupon').DataTable( {
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );
        })
    </script>
    <script type="text/javascript">
        // var elem = document.querySelectorAll('.js-switch');
        // var init = new Switchery(elem,{ size: 'small' });
        if (Array.prototype.forEach) {
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function(html) {
                var switchery = new Switchery(html,{ size: 'small' });
            });
        } else {
            var elems = document.querySelectorAll('.js-switch');

            for (var i = 0; i < elems.length; i++) {
                var switchery = new Switchery(elems[i],{ size: 'small' });
            }
        }
    </script>

    <script type="text/javascript">
        $('.delete').on('click',function (e) {
            e.preventDefault();
            var ele = $(this);
            swal({
                title: "Are you sure?",
                text: "this coupon will be disable !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo e(route('ad.coupon.dis')); ?>',
                            method: "post",
                            data: {_token: CSRF_TOKEN, id: ele.attr("data-for")},
                            success: function (response) {
                                window.location.reload();
                            },
                            error: function(xhr, textStatus, error){
                                alert(error + "\r\n" + xhr.responseText);
                            },
                        });
                    } else {

                    }
                });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>