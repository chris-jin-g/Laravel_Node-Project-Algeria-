<?php $__env->startSection('title', 'Dispatcher '); ?>

<?php $__env->startSection('content'); ?>
<div class="content-area py-1" id="dispatcher-panel">
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
<style type="text/css">
    .my-card input{
        margin-bottom: 10px;
    }
    .my-card label.checkbox-inline{
        margin-top: 10px;
        margin-right: 5px;
        margin-bottom: 0;
    }
    .my-card label.checkbox-inline input{
        position: relative;
        top: 3px;
        margin-right: 3px;
    }
    .my-card .card-header .btn{
        font-size: 10px;
        padding: 3px 7px;   
    }
    .tag.my-tag{
        padding: 10px 15px;
        font-size: 11px;
    }

    .add-nav-btn{
        padding: 5px 15px;
        min-width: 0;
    }

    .dispatcher-nav li span {
        background-color: transparent;
        color: #000!important;
        padding: 5px 12px;
    }

    .dispatcher-nav li span:hover,
    .dispatcher-nav li span:focus,
    .dispatcher-nav li span:active {
        background-color: #20b9ae;
        color: #fff!important;
        padding: 5px 12px;
    }

    .dispatcher-nav li.active span,
    .dispatcher-nav li span:hover,
    .dispatcher-nav li span:focus,
    .dispatcher-nav li span:active {
        background-color: #20b9ae;
        color: #fff!important;
        padding: 5px 12px;
    }

    @media (max-width:767px){
        .navbar-nav {
            display: inline-block;
            float: none!important;
            margin-top: 10px;
            width: 100%;
        }
        .navbar-nav .nav-item {
            display: block;
            width: 100%;
            float: none;
        }
        .navbar-nav .nav-item .btn {
            display: block;
            width: 100%;
        }
        .navbar .navbar-toggleable-sm {
            padding-top: 0;
        }
    }

    .items-list {
        height: 450px;
        overflow-y: scroll;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.5.0/react.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.5.0/react-dom.js"></script>
<script src="https://unpkg.com/babel-standalone@6.24.0/babel.min.js"></script>

<script type="text/javascript">
    window.Thinkin = <?php echo json_encode([
        "minDate" => \Carbon\Carbon::today()->format('Y-m-d\TH:i'),
        "maxDate" => \Carbon\Carbon::today()->addDays(30)->format('Y-m-d\TH:i'),
        "map" => false,
    ]); ?>

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("body").addClass("compact-sidebar");
    });
</script>

<script type="text/javascript" src="<?php echo e(asset('asset/js/dispatcher-map-admin.js')); ?>"></script>
<script type="text/babel" src="<?php echo e(asset('asset/js/dispatcher-admin.js')); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(Config::get('constants.map_key')); ?>&libraries=places&callback=initMap" async defer></script>

<script type="text/javascript">

/*var _registration = null;
function registerServiceWorker() {
  return navigator.serviceWorker.register("<?php echo e(asset('js/service-worker.js')); ?>")
  .then(function(registration) {
    console.log('Service worker successfully registered.');
    _registration = registration;
    return registration;
  })
  .catch(function(err) {
    console.error('Unable to register service worker.', err);
  });
}

function askPermission() {
  return new Promise(function(resolve, reject) {
    const permissionResult = Notification.requestPermission(function(result) {
      resolve(result);
    });

    if (permissionResult) {
      permissionResult.then(resolve, reject);
    }
  })
  .then(function(permissionResult) {
    if (permissionResult !== 'granted') {
      throw new Error('We weren\'t granted permission.');
    }
    else{
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
  const outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}

function getSWRegistration(){
  var promise = new Promise(function(resolve, reject) {
  // do a thing, possibly async, then…

  if (_registration != null) {
    resolve(_registration);
  }
  else {
    reject(Error("It broke"));
  }
  });
  return promise;
}

function subscribeUserToPush() {
  getSWRegistration()
  .then(function(registration) {
    console.log(registration);
    const subscribeOptions = {
      userVisibleOnly: true,
      applicationServerKey: urlBase64ToUint8Array(
        "<?php echo e(env('VAPID_PUBLIC_KEY')); ?>"
      )
    };
    return registration.pushManager.subscribe(subscribeOptions);
  })
  .then(function(pushSubscription) {
    console.log('Received PushSubscription: ', JSON.stringify(pushSubscription));
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
            success:function(data, textStatus, jqXHR) {
                console.log(data);
            }
        });
}


  askPermission();

  registerServiceWorker();*/

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>