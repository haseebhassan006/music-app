<?php $__env->startSection('pagination'); ?>
    <?php echo $__env->make('commons.song', ['songs' => $artist->songs, 'element' => 'genre'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo Advert::get('header'); ?>

    <?php echo $__env->make('artist.nav', ['artist' => $artist], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="page-content" class="artist bluring-helper">
        <div class="container">
            <div class="blurimg">
                <img src="<?php echo e($artist->artwork_url); ?>" alt="<?php echo $artist->name; ?>">
            </div>
            <div class="page-header artist main">
                <a class="img ">
                    <img src="<?php echo e($artist->artwork_url); ?>" alt="<?php echo e($artist->name); ?>">
                </a>
                <div class="inner">
                    <h1 title="<?php echo $artist->name; ?>"><?php echo $artist->name; ?><?php if($artist->verified): ?><span class="verified-badge basic-tooltip" tooltip="We confirmed this is the authentic artist profile for this public figure." ><svg height="16pt" viewBox="0 0 512 512" width="16pt" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm0 0" fill="#2196f3"/><path d="m385.75 201.75-138.667969 138.664062c-4.160156 4.160157-9.621093 6.253907-15.082031 6.253907s-10.921875-2.09375-15.082031-6.253907l-69.332031-69.332031c-8.34375-8.339843-8.34375-21.824219 0-30.164062 8.339843-8.34375 21.820312-8.34375 30.164062 0l54.25 54.25 123.585938-123.582031c8.339843-8.34375 21.820312-8.34375 30.164062 0 8.339844 8.339843 8.339844 21.820312 0 30.164062zm0 0" fill="#fafafa"/></svg></span><?php endif; ?></h1>
                    <div class="byline">
                        <span class="label">Artist</span>
                        <?php if($artist->facebook): ?>
                            <a class="artist-thirdparty-icon" href="<?php echo e($artist->facebook); ?>" target="_blank">
                                <svg class="icon" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path d="M448,0H64C28.704,0,0,28.704,0,64v384c0,35.296,28.704,64,64,64h192V336h-64v-80h64v-64c0-53.024,42.976-96,96-96h64v80h-32c-17.664,0-32-1.664-32,16v64h80l-32,80h-48v176h96c35.296,0,64-28.704,64-64V64C512,28.704,483.296,0,448,0z"/></svg>
                            </a>
                        <?php endif; ?>
                        <?php if($artist->twitter): ?>
                            <a class="artist-thirdparty-icon" href="<?php echo e($artist->twitter); ?>" target="_blank">
                                <svg class="icon" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 510 510" xml:space="preserve"><path d="M459,0H51C22.95,0,0,22.95,0,51v408c0,28.05,22.95,51,51,51h408c28.05,0,51-22.95,51-51V51C510,22.95,487.05,0,459,0z M400.35,186.15c-2.55,117.3-76.5,198.9-188.7,204C165.75,392.7,132.6,377.4,102,359.55c33.15,5.101,76.5-7.649,99.45-28.05c-33.15-2.55-53.55-20.4-63.75-48.45c10.2,2.55,20.4,0,28.05,0c-30.6-10.2-51-28.05-53.55-68.85c7.65,5.1,17.85,7.65,28.05,7.65c-22.95-12.75-38.25-61.2-20.4-91.8c33.15,35.7,73.95,66.3,140.25,71.4c-17.85-71.4,79.051-109.65,117.301-61.2c17.85-2.55,30.6-10.2,43.35-15.3c-5.1,17.85-15.3,28.05-28.05,38.25c12.75-2.55,25.5-5.1,35.7-10.2C425.85,165.75,413.1,175.95,400.35,186.15z"/></svg>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="actions-primary">
                        <?php echo $__env->make('artist.actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php if($artist->description): ?>
                        <div class="description">
                            <p><?php echo e($artist->description); ?></p>
                        </div>
                    <?php endif; ?>
                    <ul class="stat-summary">
                        <li>
                            <span id="song-count" class="num"><?php echo e($artist->song_count); ?></span>
                            <span class="label" data-translate-text="SONGS">Songs</span>
                        </li>
                        <li>
                            <a href="<?php echo e(route('frontend.artist.albums', ['id' => $artist->id, 'slug' => str_slug($artist->name)])); ?>">
                                <span id="album-count" class="num"><?php echo e($artist->album_count); ?></span>
                                <span class="label" data-translate-text="ALBUMS">Albums</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('frontend.artist.followers', ['id' => $artist->id, 'slug' => str_slug($artist->name)])); ?>">
                                <span id="follower-count" class="num"><?php if(intval($artist->loves)): ?><?php echo e($artist->loves); ?><?php else: ?> - <?php endif; ?></span>
                                <span class="label" data-translate-text="Fans">Fans</span>
                            </a>
                        </li>
                        <li class="tags">
                            <?php $__currentLoopData = $artist->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="genre-link" href="<?php echo e($genre->permalink_url); ?>"><span class="tag"><?php echo e($genre->name); ?></span></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="column1" class="content ">
                <?php if(count($artist->albums)): ?>
                    <div id="artist-albums-container">
                        <div id="artist-albums-header" class="sub-header">
                            <h2 class="short">
                                <span data-translate-text="FULL_ALBUMS"><?php echo e(__('web.FULL_ALBUMS')); ?></span> / <span data-translate-text="SINGLES_EPS"><?php echo e(__('web.SINGLES_EPS')); ?></span></h2>
                            <a class="view-more" href="<?php echo e(route('frontend.artist.albums', ['id' => $artist->id, 'slug' => str_slug($artist->name)])); ?>">
                                <span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span>
                            </a>
                        </div>
                        <div id="artist-albums" class="no-artist-column albums grid-albums-vertical row">
                            <?php echo $__env->make('commons.album', ['albums' => $artist->albums, 'element' => 'grid'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(count($artist->podcasts)): ?>
                    <div id="artist-albums-container">
                        <div id="artist-albums-header" class="sub-header">
                            <h2 class="short">
                                <span data-translate-text="TOP_PODCASTS"><?php echo e(__('web.TOP_PODCASTS')); ?></span></h2>
                            <a class="view-more" href="<?php echo e(route('frontend.artist.podcasts', ['id' => $artist->id, 'slug' => str_slug($artist->name)])); ?>">
                                <span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span>
                            </a>
                        </div>
                        <div id="artist-albums" class="no-artist-column albums grid-albums-vertical row">
                            <?php echo $__env->make('commons.podcast', ['podcasts' => $artist->podcasts, 'element' => 'grid'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(count($artist->songs)): ?>
                    <?php echo $__env->make('commons.toolbar.song', ['type' => 'artist', 'id' => $artist->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div id="songs-grid" class="no-artist-column profile infinity-load-more" data-total-page="<?php echo e(ceil($artist->song_count/20)); ?>">
                        <?php echo $__env->yieldContent('pagination'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div id="column2">
                <div class="content">
                    <?php echo Advert::get('sidebar'); ?>

                    <div class="content">
                        <div class="col2-tabs">
                            <a id="comments-tab" class="column2-tab show-comments active"><span data-translate-text="COMMENTS"><?php echo e(__('web.COMMENTS')); ?></span></a>
                            <a id="activity-tab" class="column2-tab show-activity"><span data-translate-text="ACTIVITY"><?php echo e(__('web.ACTIVITY')); ?></span></a>
                        </div>
                        <div id="comments">
                            <?php if(config('settings.artist_comments') && $artist->allow_comments): ?>
                                <?php echo $__env->make('comments.index', ['object' => (Object) ['id' => $artist->id, 'type' => 'App\Models\Artist', 'title' => $artist->name]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <p class="text-center mt-5">Comments are turned off.</p>
                            <?php endif; ?>
                        </div>
                        <div id="activity" class="hide">
                            <div id="small-activity-grid">
                                <?php echo $__env->make('commons.activity', ['activities' => $artist->activities, 'type' => 'small'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($artist->similar) && count($artist->similar)): ?>
                        <div id="similarArtists-digest">
                            <div class="sub-header">
                                <h3 data-translate-text="SIMILAR_ARTISTS">Related Artists</h3>
                                <a href="<?php echo e(route('frontend.artist.similar', ['id' => $artist->id, 'slug' => str_slug($artist->name)])); ?>" class="view-more" data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></a>
                            </div>
                            <ul class="snapshot">
                                <?php echo $__env->make('commons.artist', ['artists' => $artist->similar, 'element' => 'search'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo Advert::get('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/artist/index.blade.php ENDPATH**/ ?>