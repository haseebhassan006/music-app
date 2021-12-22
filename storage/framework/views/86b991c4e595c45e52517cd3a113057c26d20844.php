<script>var user_data_<?php echo e($profile->id); ?> = <?php echo json_encode(['id' => $profile->id, 'username' => $profile->username, 'name' => $profile->name, 'follower_count' => $profile->follower_count, 'artwork_url' => $profile->artwork_url, 'permalink_url' => $profile->permalink_url]); ?></script>
<div id="page-nav">
    <div class="outer">
        <ul>
            <li><a href="<?php echo e(route('frontend.user', ['username' => $profile->username])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.user'): ?> active <?php endif; ?>" data-translate-text="OVERVIEW"><?php echo e(__('web.OVERVIEW')); ?><div class="arrow"></div></a></li>
            <?php if(! $profile->activity_privacy || (auth()->check() && auth()->user()->username == $profile->username)): ?>
                <li><a href="<?php echo e(route('frontend.user.feed', ['username' => $profile->username])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.user.feed'): ?> active <?php endif; ?>" data-translate-text="NEWS_FEED"><?php echo e(__('web.NEWS_FEED')); ?><div class="arrow"></div></a></li>
            <?php endif; ?>
            <li><a href="<?php echo e(route('frontend.user.collection', ['username' => $profile->username])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.user.collection' || Route::currentRouteName() == 'frontend.user.favorites'): ?> active <?php endif; ?>" data-translate-text="COLLECTION"><?php echo e(__('web.COLLECTION')); ?><div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.user.playlists', ['username' => $profile->username])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.user.playlists' || Route::currentRouteName() == 'frontend.user.subscribed'): ?> active <?php endif; ?>" data-translate-text="PLAYLISTS"><?php echo e(__('web.PLAYLISTS')); ?><div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.user.followers', ['username' => $profile->username])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.user.followers'): ?> active <?php endif; ?>" data-translate-text="USER_FOLLOWERS"><?php echo e(__('web.USER_FOLLOWERS')); ?><div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.user.following', ['username' => $profile->username])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.user.following'): ?> active <?php endif; ?>" data-translate-text="USER_FOLLOWING"><?php echo e(__('web.USER_FOLLOWING')); ?><div class="arrow"></div></a></li>
            <?php if(auth()->check() && auth()->user()->username == $profile->username): ?>
                <li><a href="<?php echo e(route('frontend.user.notifications', ['username' => $profile->username])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.user.notifications'): ?> active <?php endif; ?>" data-translate-text="NOTIFICATIONS"><?php echo e(__('web.NOTIFICATIONS')); ?><div class="arrow"></div></a></li>
            <?php endif; ?>
            <?php if(! $profile->activity_privacy || (auth()->check() && auth()->user()->username == $profile->username)): ?>
                <li><a href="<?php echo e(route('frontend.user.now_playing', ['username' => $profile->username])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.user.now_playing'): ?> active <?php endif; ?>" data-translate-text="QUEUE"><?php echo e(__('web.QUEUE')); ?><div class="arrow"></div></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/profile/nav.blade.php ENDPATH**/ ?>