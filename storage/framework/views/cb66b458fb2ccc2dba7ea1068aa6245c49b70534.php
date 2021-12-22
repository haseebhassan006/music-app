<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('homepage.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->check()): ?>
        <div id="home-dashboard">
            <div id="home-dashboard-user">
                <a href="<?php echo e(auth()->user()->permalink_url); ?>" class="user-img-container">
                    <img src="<?php echo auth()->user()->artwork_url; ?>" class="user-img">
                </a>
                <div class="welcome-message" data-translate-text="WELCOME_BACK" data-name="<?php echo e(auth()->user()->name); ?>"><?php echo e(__('web.WELCOME_BACK', ['name' => auth()->user()->name])); ?></div>
                <div class="dashboard-links">
                    <a href="<?php echo e(route('frontend.user.favorites', ['username' => auth()->user()->username])); ?>" class="dashboard-link" data-translate-text="MY_MUSIC"><?php echo e(__('web.MY_MUSIC')); ?></a> • <a href="/<?php echo e(auth()->user()->username); ?>" class="dashboard-link" data-translate-text="VIEW_PROFILE"><?php echo e(__('web.VIEW_PROFILE')); ?></a>
                </div>
            </div>
            <ul id="home-dashboard-stats" class="stat-summary">
                <li> <a href="<?php echo e(route('frontend.user.collection', ['username' => auth()->user()->username])); ?>" class="stat"> <span id="user-collection" class="num"><?php echo e(auth()->user()->collection_count); ?></span> <span class="label" data-translate-text="SONGS"><?php echo e(__('web.SONGS')); ?></span> </a> </li>
                <li> <a href="<?php echo e(route('frontend.user.favorites', ['username' => auth()->user()->username])); ?>" class="stat"> <span id="user-favorites" class="num"><?php echo e(auth()->user()->favorite_count); ?></span> <span class="label" data-translate-text="FAVORITES"><?php echo e(__('web.FAVORITES')); ?></span> </a> </li>
                <li> <a href="<?php echo e(route('frontend.user.playlists', ['username' => auth()->user()->username])); ?>" class="stat"> <span id="user-playlists" class="num"><?php echo e(auth()->user()->playlist_count); ?></span> <span class="label" data-translate-text="PLAYLISTS"><?php echo e(__('web.PLAYLISTS')); ?></span> </a> </li>
                <li> <a href="<?php echo e(route('frontend.user.following', ['username' => auth()->user()->username])); ?>" class="stat"> <span id="user-following" class="num"><?php echo e(auth()->user()->following_count); ?></span> <span class="label" data-translate-text="FOLLOWING"><?php echo e(__('web.FOLLOWING')); ?></span> </a> </li>
                <li> <a href="<?php echo e(route('frontend.user.followers', ['username' => auth()->user()->username])); ?>" class="stat last"> <span id="user-followers" class="num"><?php echo e(auth()->user()->follower_count); ?></span> <span class="label" data-translate-text="FOLLOWERS"><?php echo e(__('web.FOLLOWERS')); ?></span> </a> </li>
            </ul>
        </div>
    <?php endif; ?>
    <div id="page-content" class="home">
        <div id="column1" class="full">
            <?php echo $__env->make('commons.slideshow', ['slides' => $home->slides], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(auth()->check()): ?>
                <?php if(isset($home->recentListens) && count($home->recentListens)): ?>
                    <?php echo $__env->make('commons.suggest', ['more_link' => auth()->user()->permalink_url, 'type' => 'recent', 'songs' => $home->recentListens, 'title' => '<span data-translate-text="LISTEN_AGAIN">' . __('web.LISTEN_AGAIN') . '</span>', 'description' => '<span class="section-tagline" data-translate-text="TAGLINE_LISTEN_AGAIN">' . __('web.TAGLINE_LISTEN_AGAIN') . '</span>'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(isset($home->userCommunitySongs) && count($home->userCommunitySongs)): ?>
                    <?php echo $__env->make('commons.suggest', ['more_link' => route('frontend.community'), 'type' => 'community', 'songs' => $home->userCommunitySongs, 'title' => '<span data-translate-text="TOP_COMMUNITY_ALBUMS">' . __('web.TOP_COMMUNITY_ALBUMS') . '</span>', 'description' => '<span class="section-tagline" data-translate-text="TAGLINE_COMMUNITY">' . __('web.TAGLINE_COMMUNITY') . '</span>'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(isset($home->obsessedSongs) && count($home->obsessedSongs)): ?>
                    <?php echo $__env->make('commons.suggest', ['more_link' => auth()->user()->permalink_url, 'type' => 'obsessed', 'songs' => $home->obsessedSongs, 'title' => '<span data-translate-text="YOU_ARE_OBSESSED_WITH_MUSIC">' . __('web.YOU_ARE_OBSESSED_WITH_MUSIC') . '</span>', 'description' => '<span class="section-tagline" data-translate-text="TAGLINE_SIMILAR_OBSESSED">' . __('web.TAGLINE_SIMILAR_OBSESSED') . '</span>'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>
            <?php echo $__env->make('commons.channel', ['channels' => $home->channels], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(isset($home->popularSongs) && count($home->popularSongs)): ?>
                <?php echo $__env->make('commons.suggest', ['more_link' => route('frontend.trending'), 'type' => 'popular', 'songs' => $home->popularSongs, 'title' => '<span data-translate-text="POPULAR">' . __('web.POPULAR') . '</span>', 'description' => '<span class="section-tagline" data-translate-text="TAGLINE_POPULAR">' . __('web.TAGLINE_POPULAR') . '</span>'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
    <?php echo Advert::get('footer'); ?>

    <?php echo $__env->make('homepage.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views\frontend\default/homepage/index.blade.php ENDPATH**/ ?>