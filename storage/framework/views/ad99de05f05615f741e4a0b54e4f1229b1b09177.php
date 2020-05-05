 <div class="row">
    <div class="col-md-6 page_info">
        Showing <?php echo e(($pagination->currentPage-1)*$pagination->perPage+1); ?> to <?php echo e($pagination->currentPage*$pagination->perPage); ?>

        of  <?php echo e($pagination->total); ?> entries                    
    </div>
    <div class="col-md-6 pagination_cover">
        <?php echo e($pagination->links); ?>

    </div>
</div>