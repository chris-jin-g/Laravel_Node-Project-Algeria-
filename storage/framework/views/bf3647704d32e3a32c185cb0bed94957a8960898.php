<?php $__env->startSection('title', 'Dashboard '); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/jvectormap/jquery-jvectormap-2.0.3.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

            
            <div class="row">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard-menus')): ?>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">local_taxi</i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('admin.dashboard.Rides'); ?></p>
                        <h3 class="card-title">
                            <?php if(!is_null($totalRides)): ?>
                                        <?php echo e($totalRides); ?>

                                    <?php endif; ?>
                        <small> Rides</small>
                        </h3>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">money</i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('admin.dashboard.Revenue'); ?></p>
                        <h3 class="card-title"><?php echo e(currency($revenue)); ?></h3>
                    </div>
                    
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">supervisor_account</i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('admin.dashboard.passengers'); ?></p>
                        <h3 class="card-title"><?php echo e($users); ?></h3>
                    </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="row">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard-menus')): ?>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-times"></i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('admin.dashboard.cancel_count'); ?></p>
                        <h3 class="card-title">
                            <?php echo e($user_cancelled); ?>

                        <small> Rides</small>
                        </h3>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-default card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-times"></i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('admin.dashboard.provider_cancel_count'); ?></p>
                        <h3 class="card-title"><?php echo e($provider_cancelled); ?></h3>
                    </div>
                    
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('admin.dashboard.providers'); ?></p>
                        <h3 class="card-title"><?php echo e($provider); ?></h3>
                    </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

        <div class="row row-md mb-2">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wallet-summary')): ?>
                <div class="col-md-4">
                <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title pull-left"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary'); ?></h4>
                </div>
                <div class="card-body">
                        <table class="table">
                            <tbody>
                            <?php ($total=$wallet['admin']); ?>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_admin_credit'); ?></th>
                                <td class="text-success"><?php echo e(currency($wallet['admin'])); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_provider_credit'); ?></th>
                                <?php if($wallet['provider_credit']): ?>
                                    <?php ($total=$total-$wallet['provider_credit'][0]['total_credit']); ?>
                                    <td class="text-success"><?php echo e(currency($wallet['provider_credit'][0]['total_credit'])); ?></td>
                                <?php else: ?>
                                    <td class="text-success"><?php echo e(currency()); ?></td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_provider_debit'); ?></th>
                                <?php if($wallet['provider_debit']): ?>

                                    <td class="text-danger"><?php echo e(currency($wallet['provider_debit'][0]['total_debit'])); ?></td>
                                <?php else: ?>
                                    <td class="text-danger"><?php echo e(currency()); ?></td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_commission'); ?></th>
                                <td class="text-success"><?php echo e(currency($wallet['admin_commission'])); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_peak_commission'); ?></th>
                                <td class="text-success"><?php echo e(currency($wallet['peak_commission'])); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_waitining_commission'); ?></th>
                                <td class="text-success"><?php echo e(currency($wallet['waiting_commission'])); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_discount'); ?></th>
                                <td class="text-danger"><?php echo e(currency($wallet['admin_discount'])); ?></td>
                            </tr>
                            <tr>
                                <?php ($total=$total-($wallet['admin_tax'])); ?>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_tax_amount'); ?></th>
                                <td class="text-success"><?php echo e(currency($wallet['admin_tax'])); ?></td>
                            </tr>

                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_tips'); ?></th>
                                <td class="text-danger"><?php echo e(currency($wallet['tips'])); ?></td>
                            </tr>

                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_referrals'); ?></th>
                                <td class="text-danger"><?php echo e(currency($wallet['admin_referral'])); ?></td>
                            </tr>

                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_disputes'); ?></th>
                                <td class="text-danger"><?php echo e(currency($wallet['admin_dispute'])); ?></td>
                            </tr>

                            <!--                             <tr>
                            <th scope="row text-right"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_total'); ?></th>
                            <td><?php echo e(currency($total)); ?></td>
                        </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recent-rides')): ?>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title pull-left"><?php echo app('translator')->getFromJson('admin.dashboard.Recent_Rides'); ?></h4>
                        </div>
                        <div class="card-body">
                                <table class="table">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody>
                                    <?php if(is_null($rides)): ?>
                                        <tr>
                                            <th>Select a city
                                            </th>
                                        </tr>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $rides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ride): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><?php echo e($index + 1); ?></th>
                                                <td><?php echo e($ride->user->first_name); ?> <?php echo e($ride->user->last_name); ?></td>
                                                <td>
                                                    <a class="text-primary"
                                                        href="<?php echo e(route('admin.requests.show',$ride->id)); ?>"><span
                                                                class="underline"><?php echo app('translator')->getFromJson('admin.dashboard.View_Ride_Details'); ?></span></a>
                                                </td>
                                                <td>
                                                    <span class="text-muted"><?php echo e($ride->created_at->diffForHumans()); ?></span>
                                                </td>
                                                <td>
                                                    <?php if($ride->status == "COMPLETED"): ?>
                                                        <span class="tag tag-success">COMPLETED</span>
                                                    <?php elseif($ride->status == "CANCELLED"): ?>
                                                        <span class="tag tag-danger">CANCELLED</span>
                                                    <?php elseif($ride->status == "ARRIVED"): ?>
                                                        <span class="tag tag-info">ARRIVED</span>
                                                    <?php elseif($ride->status == "SEARCHING"): ?>
                                                        <span class="tag tag-info">SEARCHING</span>
                                                    <?php elseif($ride->status == "ACCEPTED"): ?>
                                                        <span class="tag tag-info">ACCEPTED</span>
                                                    <?php elseif($ride->status == "STARTED"): ?>
                                                        <span class="tag tag-info">STARTED</span>
                                                    <?php elseif($ride->status == "DROPPED"): ?>
                                                        <span class="tag tag-info">DROPPED</span>
                                                    <?php elseif($ride->status == "PICKEDUP"): ?>
                                                        <span class="tag tag-info">PICKEDUP</span>
                                                    <?php elseif($ride->status == "SCHEDULED"): ?>
                                                        <span class="tag tag-info">SCHEDULED</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript">

        var _registration = null;
        var rota = "<?php echo e(route('admin.dashboard')); ?>";

        $('#city').on("change", function () {
            if($(this).val() === ""){
                window.location.href = rota;
            }else{
               window.location.href = rota + "?city="+$(this).val(); 
            }
           
        });

        function registerServiceWorker() {
            return navigator.serviceWorker.register("<?php echo e(asset('js/service-worker.js')); ?>")
                .then(function (registration) {
                    _registration = registration;
                    return registration;
                })
                .catch(function (err) {
                    console.error('Unable to register service worker.', err);
                });
        }

        function askPermission() {
            return new Promise(function (resolve, reject) {
                const permissionResult = Notification.requestPermission(function (result) {
                    resolve(result);
                });

                if (permissionResult) {
                    permissionResult.then(resolve, reject);
                }
            })
                .then(function (permissionResult) {
                    if (permissionResult !== 'granted') {
                        throw new Error('We weren\'t granted permission.');
                    } else {
                        subscribeUserToPush();
                    }
                });
        }

        function urlBase64ToUint8Array(base64String) {
            const padding = '='.repeat((4 - base64String.length % 4) % 4);
            const base64 = (base64String + padding)
                .replace(/\-/g, '+')
                .replace(/_/g, '/');

            const rawData = window.atob(base64);
            //const rawData = new Blob([base64], {type: 'text/plain'})
            const outputArray = new Uint8Array(rawData.length);

            for (let i = 0; i < rawData.length; ++i) {
                outputArray[i] = rawData.charCodeAt(i);
            }
            return outputArray;
        }

        function getSWRegistration() {
            return new Promise(function (resolve, reject) {
                if (_registration != null) {
                    resolve(_registration);
                } else {
                    reject(Error("It broke"));
                }
            });
        }

        function subscribeUserToPush() {
            getSWRegistration()
                .then(function (registration) {
                    const subscribeOptions = {
                        userVisibleOnly: true,
                        applicationServerKey: urlBase64ToUint8Array('BCBsViMBVOOYATOaY4AjZOl1XCwiBqXbQtMcp4RXRmyfR927SqcCUt2SYwiF3iy3yxf3n60jVf8XF9vDE2ShVtM')
                    };
                    return registration.pushManager.subscribe(subscribeOptions);

                })
                .then(function (pushSubscription) {
                    sendSubscriptionToBackEnd(pushSubscription);
                    return pushSubscription;
                });
        }

        function sendSubscriptionToBackEnd(subscription) {
            $.ajax({
                url: "/save-subscription/<?php echo e(Auth::user()->id); ?>/admin",
                headers: {'Content-Type': 'application/json'},
                type: 'post',
                data: JSON.stringify(subscription),
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                }
            });
        }


        registerServiceWorker();

        askPermission();

    </script>

<script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>