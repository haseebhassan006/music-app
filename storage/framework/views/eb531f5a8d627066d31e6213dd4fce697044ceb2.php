<?php $__currentLoopData = $podcasts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $podcast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>var podcast_data_<?php echo e($podcast->id); ?> = <?php echo json_encode($podcast); ?></script>
    <?php if($element == "carousel"): ?>
        <div class="module module-cell playlist block swiper-slide draggable" data-toggle="contextmenu" data-trigger="right" data-type="podcast" data-id="<?php echo e($podcast->id); ?>">
            <div class="img-container">
                <img class="img" src="<?php echo e($podcast->artwork_url); ?>">
                <a class="overlay-link" href="<?php echo e($podcast->permalink_url); ?>"></a>
                <div class="actions primary">
                    <a class="btn play play-lg play-scale play-object" data-type="podcast" data-id="<?php echo e($podcast->id); ?>">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M8 5v14l11-7z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                    </a>
                </div>
            </div>
            <div class="module-inner">
                <a href="<?php echo e($podcast->permalink_url); ?>" class="podcast-link title"><?php echo $podcast->title; ?></a>
                <?php if(isset($podcast->artist)): ?>
                    <span class="byline">by <a href="<?php echo e($podcast->artist->permalink_url); ?>" class="artist-link artist" title="<?php echo e($podcast->artist->name); ?>"><?php echo e($podcast->artist->name); ?></a></span>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif($element == "search"): ?>
        <div class="module module-row tall album" data-index="<?php echo e($index); ?>">
            <div class="img-container">
                <img class="img" src="<?php echo e($podcast->artwork_url); ?>" alt="<?php echo $podcast->title; ?>">
            </div>
            <div class="metadata album">
                <a href="<?php echo e($podcast->permalink_url); ?>" class="title podcast-link"><?php echo $podcast->title; ?></a>
                <div class="meta-inner">
                    <?php if(isset($podcast->artist)): ?>
                        <span class="byline">by <a href="<?php echo e($podcast->artist->permalink_url); ?>" class="artist-link artist" title="<?php echo e($podcast->artist->name); ?>"><?php echo e($podcast->artist->name); ?></a></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php elseif($element == "grid"): ?>
        <div class="module module-cell grid-item">
            <div class="img-container">
                <img class="img" src="<?php echo e($podcast->artwork_url); ?>" alt="<?php echo $podcast->title; ?>">
                <a class="overlay-link" href="<?php echo e($podcast->permalink_url); ?>"></a>
                <div class="actions primary">
                    <a class="btn btn-secondary btn-icon-only btn-options" data-toggle="contextmenu" data-trigger="left" data-type="podcast" data-id="<?php echo e($podcast->id); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                    </a>
                    <a class="btn btn-secondary btn-icon-only btn-rounded btn-play play-or-add play-object" data-type="podcast" data-id="<?php echo e($podcast->id); ?>">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" height="26" width="20"><path d="M8 5v14l11-7z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                    </a>
                </div>
            </div>
            <div class="module-inner podcast">
                <a href="<?php echo e($podcast->permalink_url); ?>" class="headline title"><?php echo e($podcast->title); ?></a>
                <?php if(isset($podcast->artist)): ?>
                    <span class="byline">by <a href="<?php echo e($podcast->artist->permalink_url); ?>" class="artist-link artist" title="<?php echo e($podcast->artist->name); ?>"><?php echo e($podcast->artist->name); ?></a></span>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif($element == "genre"): ?>
        <div class="module module-row station tall" data-index="<?php echo e($index); ?>">
            <div class="img-container">
                <img class="img" src="<?php echo e($podcast->artwork_url); ?>" alt="<?php echo e($podcast->title); ?>">
                <a class="overlay-link" href="<?php echo e($podcast->permalink_url); ?>"></a>
                <div class="row-actions primary">
                    <a class="btn play-lg play-object" data-type="podcast" data-id="<?php echo e($podcast->id); ?>">
                        <svg class="icon-play" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                    </a>
                </div>
            </div>
            <div class="metadata station">
                <div class="title">
                    <a href="<?php echo e($podcast->permalink_url); ?>"><?php echo e($podcast->title); ?></a>
                </div>
                <div class="description">
                    <?php if(isset($podcast->artist)): ?>
                        <span class="byline">by <a href="<?php echo e($podcast->artist->permalink_url); ?>" class="artist-link artist" title="<?php echo e($podcast->artist->name); ?>"><?php echo e($podcast->artist->name); ?></a></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php elseif($element == "activity"): ?>
        <?php if(count($podcasts) > 1): ?>
            <a href="<?php echo e($podcast->permalink_url); ?>" class="feed-item-img small " data-toggle="contextmenu" data-trigger="right" data-type="podcast" data-id="<?php echo e($podcast->id); ?>">
                <img src="<?php echo e($podcast->artwork_url); ?>" class="row-feed-image">
            </a>
        <?php else: ?>
            <div class="feed-item">
                <a href="<?php echo e($podcast->permalink_url); ?>" class="feed-item-img " data-toggle="contextmenu" data-trigger="right" data-type="playlist" data-id="<?php echo e($podcast->id); ?>">
                    <img class="feed-img-medium" src="<?php echo e($podcast->artwork_url); ?>" width="80" height="80">
                </a>
                <div class="inner">
                    <a href="<?php echo e($podcast->permalink_url); ?>" class="item-title podcast-link"><?php echo e($podcast->title); ?></a>
                    <?php if(isset($podcast->artist)): ?>
                        <a href="<?php echo e($podcast->artist->permalink_url); ?>" class="item-subtitle artist-link" title="<?php echo e($podcast->artist->name); ?>"><?php echo e($podcast->artist->name); ?></a>
                    <?php endif; ?>
                    <a class="btn play play-object" data-type="podcast" data-id="<?php echo e($podcast->id); ?>">
                        <svg height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M8 5v14l11-7z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                        <span data-translate-text="PLAY_ALBUM">Play Album</span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views\frontend\default/commons/podcast.blade.php ENDPATH**/ ?>