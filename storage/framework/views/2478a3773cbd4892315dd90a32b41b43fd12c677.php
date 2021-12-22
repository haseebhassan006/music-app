<div id="page-nav">
    <div class="outer">
        <ul>
            <li><a href="<?php echo e($playlist->permalink_url); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.playlist'): ?> active <?php endif; ?>" data-translate-text="OVERVIEW"><?php echo e(__('web.OVERVIEW')); ?><div class="arrow"></div></a></li>
            <?php if($playlist->visibility): ?>
                <li><a href="<?php echo e($playlist->permalink_url); ?>/subscribers" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.playlist.subscribers'): ?> active <?php endif; ?>" data-translate-text="SUBSCRIBERS"><?php echo e(__('web.SUBSCRIBERS')); ?><div class="arrow"></div></a></li>
                <li><a href="<?php echo e($playlist->permalink_url); ?>/collaborators" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.playlist.collaborators'): ?> active <?php endif; ?>" data-translate-text="PLAYLIST_COLLABORATORS"><?php echo e(__('web.PLAYLIST_COLLABORATORS')); ?><div class="arrow"></div></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php echo Advert::get('header'); ?>

<?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/playlist/nav.blade.php ENDPATH**/ ?>