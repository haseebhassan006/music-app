<?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>var album_data_<?php echo e($album->id); ?> = <?php echo json_encode($album); ?></script>
    <?php if($element == "carousel"): ?>
        <div class="module module-cell album block swiper-slide draggable" data-toggle="contextmenu" data-trigger="right" data-type="album" data-id="<?php echo e($album->id); ?>">
            <div class="img-container">
                <img class="img" src="<?php echo e($album->artwork_url); ?>">
                <a class="overlay-link" href="<?php echo e($album->permalink_url); ?>"></a>
                <div class="actions primary">
                    <a class="btn play play-lg play-scale play-object" data-type="album" data-id="<?php echo e($album->id); ?>">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M8 5v14l11-7z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                    </a>
                </div>
            </div>
            <div class="module-inner">
                <a href="<?php echo e($album->permalink_url); ?>" class="album-link title"><?php echo $album->title; ?></a>
                <span class="byline">by <?php $__currentLoopData = $album->artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><a href="<?php echo e($artist->permalink_url); ?>" class="artist-link artist" title="<?php echo $artist->name; ?>"><?php echo $artist->name; ?></a><?php if(!$loop->last): ?>, <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></span>
            </div>
        </div>
    <?php elseif($element == "search"): ?>
        <div class="module module-row tall album" data-index="<?php echo e($index); ?>">
            <div class="img-container">
                <img class="img" src="<?php echo e($album->artwork_url); ?>" alt="<?php echo $album->title; ?>">
            </div>
            <div class="metadata album">
                <a href="<?php echo e($album->permalink_url); ?>" class="title album-link"><?php echo $album->title; ?></a>
                <div class="meta-inner">
                    <span data-translate-text="BY">by</span> <?php $__currentLoopData = $album->artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><a class="meta-text artist-link" href="<?php echo e($artist->permalink_url); ?>" title="<?php echo $artist->name; ?>"><?php echo $artist->name; ?></a><?php if(!$loop->last): ?>, <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php elseif($element == "grid"): ?>
        <div class="module module-cell grid-item">
            <div class="img-container">
                <img class="img" src="<?php echo e($album->artwork_url); ?>" alt="<?php echo $album->title; ?>">
                <a class="overlay-link" href="<?php echo e($album->permalink_url); ?>"></a>
                <div class="actions primary">
                    <a class="btn btn-secondary btn-icon-only btn-options" data-toggle="contextmenu" data-trigger="left" data-type="album" data-id="<?php echo e($album->id); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                    </a>
                    <a class="btn btn-secondary btn-icon-only btn-rounded btn-play play-or-add play-object" data-type="album" data-id="<?php echo e($album->id); ?>">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" height="26" width="20"><path d="M8 5v14l11-7z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                    </a>
                </div>
            </div>
            <div class="module-inner album">
                <a href="<?php echo e($album->permalink_url); ?>" class="headline title"><?php echo $album->title; ?></a>
                <span class="byline">by <?php $__currentLoopData = $album->artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><a class="secondary-text" href="<?php echo e($artist->permalink_url); ?>" title="<?php echo $artist->name; ?>"><?php echo $artist->name; ?></a><?php if(!$loop->last): ?>, <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></span>
            </div>
        </div>
    <?php elseif($element == "activity"): ?>
        <?php if(count($albums) > 1): ?>
            <a href="<?php echo e($album->permalink_url); ?>" class="feed-item-img small " data-toggle="contextmenu" data-trigger="right" data-type="album" data-id="<?php echo e($album->id); ?>">
                <img src="<?php echo e($album->artwork_url); ?>" class="row-feed-image">
            </a>
        <?php else: ?>
            <div class="feed-item">
                <a href="<?php echo e($album->permalink_url); ?>" class="feed-item-img " data-toggle="contextmenu" data-trigger="right" data-type="playlist" data-id="<?php echo e($album->id); ?>">
                    <img class="feed-img-medium" src="<?php echo e($album->artwork_url); ?>" width="80" height="80">
                </a>
                <div class="inner">
                    <a href="<?php echo e($album->permalink_url); ?>" class="item-title album-link"><?php echo $album->title; ?></a>
                    <?php $__currentLoopData = $album->artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><a class="item-subtitle artist-link" href="<?php echo e($artist->permalink_url); ?>"><?php echo $artist->name; ?></a><?php if(!$loop->last): ?>, <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <a class="btn play play-object" data-type="album" data-id="<?php echo e($album->id); ?>">
                        <svg height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M8 5v14l11-7z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                        <span data-translate-text="PLAY_ALBUM">Play Album</span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/commons/album.blade.php ENDPATH**/ ?>