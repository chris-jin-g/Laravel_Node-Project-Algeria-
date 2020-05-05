<?php $__env->startSection('title', 'Map View '); ?>

<?php $__env->startSection('content'); ?>

<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Map View</h4>
            </div>
            <div class="card-body">
                
                    <div id="map"></div>
                    <div id="legend"><h3>Note: </h3></div>
                
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style type="text/css">
    #map {
        height: 100%;
        min-height: 500px;
    }
    
    #legend {
        font-family: Arial, sans-serif;
        background: rgba(255,255,255,0.8);
        padding: 10px;
        margin: 10px;
        border: 2px solid #f3f3f3;
    }

    #legend h3 {
        margin-top: 0;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }

    #legend img {
        vertical-align: middle;
        margin-bottom: 5px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    var map;
    var users;
    var providers;
    var ajaxMarkers = [];
    var googleMarkers = [];
    var mapIcons = {
        user: '<?php echo e(asset("asset/img/marker-user.png")); ?>',
        active: '<?php echo e(asset("asset/img/marker-car.png")); ?>',
        riding: '<?php echo e(asset("asset/img/marker-car.png")); ?>',
        offline: '<?php echo e(asset("asset/img/marker-home.png")); ?>',
        unactivated: '<?php echo e(asset("asset/img/marker-plus.png")); ?>'
    }

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 0, lng: 0},
            zoom: 2,
            minZoom: 1
        });

        setInterval(ajaxMapData, 3000);

        var legend = document.getElementById('legend');

        var div = document.createElement('div');
        div.innerHTML = '<img src="' + mapIcons['user'] + '"> ' + 'User';
        legend.appendChild(div);

        var div = document.createElement('div');
        div.innerHTML = '<img src="' + mapIcons['offline'] + '"> ' + 'Driver Offline';
        legend.appendChild(div);
        
        var div = document.createElement('div');
        div.innerHTML = '<img src="' + mapIcons['active'] + '"> ' + 'Driver Available';
        legend.appendChild(div);
        
        var div = document.createElement('div');
        div.innerHTML = '<img src="' + mapIcons['unactivated'] + '"> ' + 'Inactive Driver';
        legend.appendChild(div);
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
        
        google.maps.Map.prototype.clearOverlays = function() {
            for (var i = 0; i < googleMarkers.length; i++ ) {
                googleMarkers[i].setMap(null);
            }
            googleMarkers.length = 0;
        }

    }

    function ajaxMapData() {
        map.clearOverlays();
        $.ajax({
            url: '/admin/map/ajax',
            dataType: "JSON",
            headers: {'X-CSRF-TOKEN': window.Laravel.csrfToken },
            type: "GET",
            success: function(data) {
                console.log('Ajax Response', data);
                ajaxMarkers = data;
            }
        });

        ajaxMarkers ? ajaxMarkers.forEach(addMarkerToMap) : '';
    }

    function addMarkerToMap(element, index) {
        
        marker = new google.maps.Marker({
            position: {
                lat: element.latitude,
                lng: element.longitude
            },
            id: element.id,
            map: map,
            title: element.first_name + " " +element.last_name,
            icon : mapIcons[element.service ? element.service.status : element.status],
        });

        googleMarkers.push(marker);

        google.maps.event.addListener(marker, 'click', function() {
            window.location.href = '/admin/' + element.service ? 'provider' : 'user' + '/' +element.user_id;
        });
    }
</script>
<script src="//maps.googleapis.com/maps/api/js?key=<?php echo e(Config::get('constants.map_key')); ?>&libraries=places&callback=initMap" async defer></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>