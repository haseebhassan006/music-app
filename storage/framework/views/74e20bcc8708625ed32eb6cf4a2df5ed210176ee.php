<div id="page-nav" class="home-nav">
    <div class="outer">
        <ul>
            <li><a href="<?php echo e(route('frontend.homepage')); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.homepage'): ?> active <?php endif; ?>">
                    <span data-translate-text="HOME"><?php echo e(__('web.HOME')); ?></span>
                    <div class="arrow"></div>
                </a>
            </li>
            <li><a href="<?php echo e(route('frontend.discover')); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.discover'): ?> active <?php endif; ?>"><span data-translate-text="DISCOVER"><?php echo e(__('web.DISCOVER')); ?></span><div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.community')); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.community'): ?> active <?php endif; ?>"><span data-translate-text="COMMUNITY"><?php echo e(__('web.COMMUNITY')); ?></span><div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.trending')); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.trending'): ?> active <?php endif; ?>"><span data-translate-text="TRENDING"><?php echo e(__('web.TRENDING')); ?></span><div class="arrow"></div></a></li>
        </ul>
    </div>
</div>
<?php echo Advert::get('header'); ?><?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views\frontend\default/homepage/nav.blade.php ENDPATH**/ ?>