<footer class="footer">
	<div class="container-fluid">
	  <div class="copyright float-right" id="date">
		<?php echo e(config('constants.site_copyright', 'Thinkin Cab')); ?>

	  </div>
	</div>
  </footer>
  <script>
	const x = new Date().getFullYear();
	let date = document.getElementById('date');
	date.innerHTML = '&copy; ' + x + date.innerHTML;
  </script>