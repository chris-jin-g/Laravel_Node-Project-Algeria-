<?php $__env->startSection('title', 'Funções '); ?>

<?php $__env->startSection('content'); ?>
<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <?php if(Setting::get('demo_mode', 0) == 1): ?>
                <div class="col-md-12" style="height:50px;color:red;">
                            ** Demo Mode : <?php echo app('translator')->getFromJson('admin.demomode'); ?>
                        </div>
                        <?php endif; ?>
                    <h5 class="card-title ">
                        <?php echo app('translator')->getFromJson('admin.roles.role_name'); ?>
                        <?php if(Setting::get('demo_mode', 0) == 1): ?>
                        <span class="pull-right">(*personal information hidden in demo)</span>
                        <?php endif; ?>               
                    </h5>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                    <a href="<?php echo e(route('admin.role.create')); ?>" style="margin-left: 1em;" class="btn pull-right"><i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('admin.roles.add_role'); ?></a>
                    <?php endif; ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.roles.role_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($role->name); ?></td>
                        <td>
                            <?php if($role->id>5): ?>
                                <form action="<?php echo e(route('admin.role.destroy', $role->id)); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="_method" value="DELETE">
                                    <?php if( Setting::get('demo_mode', 0) == 0): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                                    <a href="<?php echo e(route('admin.role.edit', $role->id)); ?>" class="btn btn-info"><i class="fa fa-pencil"></i> <?php echo app('translator')->getFromJson('admin.edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('admin.delete'); ?></button>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </form>
                            <?php else: ?>
                                -    
                            <?php endif; ?>    
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.roles.role_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </tfoot>
            </table>          
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    jQuery.fn.DataTable.Api.register( 'buttons.exportData()', function ( options ) {
        if ( this.context.length ) {
            var jsonResult = $.ajax({
                url: "<?php echo e(url('admin/user')); ?>?page=all",
                data: {},
                success: function (result) {                       
                    p = new Array();
                    $.each(result.data, function (i, d)
                    {
                        var item = [d.id,d.first_name, d.last_name, d.email,d.mobile,d.rating, d.wallet_balance];
                        p.push(item);
                    });
                },
                async: false
            });
            var head=new Array();
            head.push("ID", "First Name", "Last Name", "Email", "Mobile", "Rating", "Wallet Amount");            
            return {body: p, header: head};
        }
    } );

    $('#table-5').DataTable( {
        responsive: true,
        paging:false,
            info:false,
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
    } );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>