
<!-- Header -->

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)"><?php echo $__env->yieldContent('title'); ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placehold="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="nav navbar-nav">
                <li class="nav-item hidden-sm-down">
                    <a class="nav-link toggle-fullscreen" href="#">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav float-md-right">
                <li class="nav-item dropdown hidden-sm-down">
                    <a class="nav-link" href="#" data-toggle="dropdown">
                        <i class="material-icons">person</i>
                      </a>
                    <div class="dropdown-menu dropdown-menu-right animated fadeInUp">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account-settings')): ?>
                        <a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>">
                            <i class="ti-user mr-0-5"></i> <?php echo app('translator')->getFromJson('admin.include.profile'); ?>
                        </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('change-password')): ?>		
                        <a class="dropdown-item" href="<?php echo e(route('admin.password')); ?>">
                            <i class="ti-settings mr-0-5"></i> <?php echo app('translator')->getFromJson('admin.account.change_password'); ?>
                        </a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        
                        <a class="dropdown-item" href="<?php echo e(url('/admin/logout')); ?>"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="ti-power-off mr-0-5"></i> <?php echo app('translator')->getFromJson('admin.include.sign_out'); ?></a>
                        <form id="logout-form" action="<?php echo e(url('/admin/logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                </li>
            </ul>
          </div>
        </div>
      </nav>

