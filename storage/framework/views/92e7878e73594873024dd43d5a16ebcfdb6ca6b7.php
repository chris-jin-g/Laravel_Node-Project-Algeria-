<?php $__env->startSection('title', 'Payment History'); ?>

<?php $__env->startSection('content'); ?>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                <h5 class="card-title"><?php echo app('translator')->getFromJson('admin.payment.payment_history'); ?></h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('admin.payment.request_id'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.payment.transaction_id'); ?></th>
                            <!-- <th><?php echo app('translator')->getFromJson('admin.payment.from'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.payment.to'); ?></th> -->
                            <th><?php echo app('translator')->getFromJson('admin.payment.total_amount'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.payment.provider_amount'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.payment.payment_mode'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.payment.payment_status'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($payment->id); ?></td>
                            <td><?php if(!empty($payment->payment->payment_id)): ?><?php echo e($payment->payment->payment_id); ?><?php else: ?> NA <?php endif; ?></td>
                            <!-- <td><?php echo e($payment->user?$payment->user->first_name:''); ?> <?php echo e($payment->user?$payment->user->last_name:''); ?></td>
                            <td><?php echo e($payment->provider?$payment->provider->first_name:''); ?> <?php echo e($payment->provider?$payment->provider->last_name:''); ?></td> -->
                            <td><?php echo e(currency($payment->payment->total)); ?></td>
                            <td><?php echo e(currency($payment->payment->provider_pay)); ?></td>
                            <td><?php echo e($payment->payment_mode == "CASH" ? "DINHEIRO" : "CARTÃO"); ?></td>
                            <td>
                                <?php if($payment->paid): ?>
                                    Paid
                                <?php else: ?>
                                    Not Paid
                                <?php endif; ?>
                            </td>
                            <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Ação
                                </button>
                                <div class="dropdown-menu">
                                    <a href="<?php echo e(route('admin.requests.show', $payment->id)); ?>" class="dropdown-item">
                                        <i class="fa fa-search"></i> More details
                                    </a>
                                </div>
                            </div>
                        </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('admin.payment.request_id'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.payment.transaction_id'); ?></th>
                            <!-- <th><?php echo app('translator')->getFromJson('admin.payment.from'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.payment.to'); ?></th> -->
                            <th><?php echo app('translator')->getFromJson('admin.payment.total_amount'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.payment.provider_amount'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.payment.payment_mode'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.payment.payment_status'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                        </tr>
                    </tfoot>
                </table>
                <?php echo $__env->make('common.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>