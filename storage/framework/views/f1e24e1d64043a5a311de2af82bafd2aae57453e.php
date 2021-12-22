<?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>var artist_data_<?php echo e($artist->id); ?> = <?php echo json_encode($artist); ?></script>
    <?php if($element == "carousel"): ?>
    <div class="module module-cell artist swiper-slide draggable" data-toggle="contextmenu" data-trigger="right" data-type="artist" data-id="<?php echo e($artist->id); ?>">
        <div class="img-container">
            <img class="img" src="<?php echo e($artist->artwork_url); ?>">
            <a class="overlay-link" href="<?php echo e($artist->permalink_url); ?>"></a>
            <div class="actions primary">
                <a class="btn play play-lg play-scale play-station" data-type="artist" data-id="<?php echo e($artist->id); ?>">
                    <svg class="icon-play" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                </a>
            </div>
        </div>
        <div class="module-inner">
            <a class="artist-link title" data-artist-id="<?php echo e($artist->id); ?>" href="<?php echo e($artist->permalink_url); ?>" title="<?php echo $artist->name; ?>"> <?php echo $artist->name; ?></a>
        </div>
    </div>
    <?php elseif($element == "search"): ?>
        <div class="module module-row tall artist" data-index="<?php echo e($index); ?>">
            <div class="img-container">
                <img class="img lazy" src="<?php echo e(asset('common/default/artist.png')); ?>" alt="<?php echo $artist->name; ?>" data-src="<?php echo e($artist->artwork_url); ?>">
            </div>
            <div class="metadata artist">
                <a href="<?php echo e($artist->permalink_url); ?>" class="title artist-link"><?php echo $artist->name; ?></a>
            </div>
            <div class="row-actions secondary">
                <a class="btn favorite <?php if($artist->favorite): ?> on btn-success <?php endif; ?>" data-type="artist" data-id="<?php echo e($artist->id); ?>" data-title="<?php echo $artist->name; ?>" data-url="<?php echo e($artist->permalink_url); ?>">
                    <svg class="off" height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                    <svg class="on" height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"/><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                    <span class="favorite-label" data-translate-text="FOLLOW"><?php if($artist->favorite): ?> Following <?php else: ?> Follow <?php endif; ?></span>
                </a>
            </div>
        </div>
    <?php elseif($element == "activity"): ?>
        <?php if(count($activity->details->objects) > 1): ?>
        <a href="<?php echo e($artist->permalink_url); ?>" class="feed-item-img show-artist-tooltip small artist-link circle" data-artist-id="<?php echo e($artist->id); ?>">
            <img src="<?php echo e($artist->artwork_url); ?>" class="row-feed-image circle">
        </a>
        <?php else: ?>
        <div class="feed-item">
            <a href="<?php echo e($artist->permalink_url); ?>" class="feed-item-img show-artist-tooltip artist-link circle" data-artistt-id="<?php echo e($artist->id); ?>">
                <img class="feed-img-medium circle" src="<?php echo e($artist->artwork_url); ?>" width="80" height="80">
            </a>
            <div class="inner">
                <a href="<?php echo e($artist->permalink_url); ?>" class="item-title artist-link" data-artist-id="<?php echo e($artist->id); ?>"><?php echo $artist->name; ?></a>
                <a class="btn favorite <?php if($artist->favorite): ?> on btn-success <?php endif; ?>" data-type="artist" data-id="<?php echo e($artist->id); ?>" data-title="<?php echo $artist->name; ?>" data-url="<?php echo e($artist->permalink_url); ?>">
                    <svg class="off" height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                    <svg class="on" height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"/><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                    <span class="favorite-label" data-translate-text="FOLLOW"><?php if($artist->favorite): ?> Following <?php else: ?> Follow <?php endif; ?></span>
                </a>
            </div>
        </div>
        <?php endif; ?>
    <?php else: ?>
    <div class="module module-profile-card artist" id="artist-<?php echo e($artist->id); ?>">
        <div class="actions">
            <a class="btn play-station" data-type="artist" data-id="<?php echo e($artist->id); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><circle cx="6.18" cy="17.82" r="2.18"/><path d="M4 4.44v2.83c7.03 0 12.73 5.7 12.73 12.73h2.83c0-8.59-6.97-15.56-15.56-15.56zm0 5.66v2.83c3.9 0 7.07 3.17 7.07 7.07h2.83c0-5.47-4.43-9.9-9.9-9.9z"/></svg>
                <span data-translate-text="START_STATION"><?php echo e(__('web.START_STATION')); ?></span>
            </a>
            <a class="btn btn-favorite favorite <?php if($artist->favorite): ?> on <?php endif; ?>" data-type="artist" data-id="<?php echo e($artist->id); ?>" data-title="<?php echo $artist->name; ?>" data-url="<?php echo e($artist->permalink_url); ?>" data-text-on="<?php echo e(__('web.UNFOLLOW')); ?>" data-text-off="<?php echo e(__('web.FOLLOW')); ?>">
                <svg class="off" height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                <svg class="on" height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"/><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                <span class="label desktop" <?php if($artist->favorite): ?> data-translate-text="FOLLOWING" <?php else: ?> data-translate-text="FOLLOW" <?php endif; ?> ><?php if($artist->favorite): ?> Following <?php else: ?> Follow <?php endif; ?></span>
            </a>
        </div>
        <div class="img-container">
            <a href="<?php echo e($artist->permalink_url); ?>">
                <img class="img" src="<?php echo e($artist->artwork_url); ?>">
            </a>
        </div>
        <div class="module-inner">
            <h3 class="artist-name"><a href="<?php echo e($artist->permalink_url); ?>" class="artist-link"><?php echo $artist->name; ?></a></h3>
            <div class="metadata">
                <a href="<?php echo e($artist->permalink_url); ?>/followers" class="metadata-link">
                    <span class="followers-num"><?php if($artist->loves): ?><?php echo e($artist->loves); ?><?php else: ?> - <?php endif; ?></span>
                    <span data-translate-text="FOLLOWERS">Followers</span>
                </a>
            </div>
            <div class="tags"> </div>
        </div>
    </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/commons/artist.blade.php ENDPATH**/ ?>