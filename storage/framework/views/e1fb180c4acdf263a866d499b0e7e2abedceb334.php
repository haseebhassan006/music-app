<div id="page-nav">
    <div class="outer">
        <ul>
            <li><a href="<?php echo e($podcast->permalink_url); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.podcast'): ?> active <?php endif; ?>" data-translate-text="OVERVIEW"><?php echo e(__('web.OVERVIEW')); ?><div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.podcast.subscribers', ['id' => $podcast->id, 'slug' => str_slug($podcast->title)])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.podcast.subscribers'): ?> active <?php endif; ?>" data-translate-text="SUBSCRIBERS"><?php echo e(__('web.SUBSCRIBERS')); ?><div class="arrow"></div></a></li>
        </ul>
    </div>
</div>
<?php echo Advert::get('header'); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/podcast/nav.blade.php ENDPATH**/ ?>