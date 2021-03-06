<?php $__env->startSection('content'); ?>
    <div id="page-content">
        <div class="empty-page no-nav">
            <div class="empty-inner">
                <h2 data-translate-text="PAGE_NOT_FOUND"><?php echo e(__('web.PAGE_NOT_FOUND')); ?></h2>
                <p data-translate-text="PAGE_NOT_FOUND_SUB"><?php echo e(__('web.PAGE_NOT_FOUND_SUB')); ?></p>
                <form class="empty-search do-search">
                    <input class="search-input" type="text" data-action="search">
                    <div class="icon search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                            <path d="M0 0h24v24H0z" fill="none"></path>
                        </svg>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views/errors/404.blade.php ENDPATH**/ ?>