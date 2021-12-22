<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('podcast.nav', ['podcast' => $podcast], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>var podcast_data_<?php echo e($podcast->id); ?> = <?php echo json_encode($podcast->makeHidden('episodes')); ?></script>
    <div id="page-content" class="bluring-helper">
        <div class="container">
            <div class="blurimg">
                <img src="<?php echo e($podcast->artwork_url); ?>" alt="<?php echo e($podcast->title); ?>">
            </div>
            <div class="row podcast-show">
                <div class="col-lg-4 col-12">
                    <div class="img">
                        <img id="page-cover-art" src="<?php echo e($podcast->artwork_url); ?>" alt="<?php echo e($podcast->title); ?>">
                        <div class="inner mobile">
                            <h1 title="<?php echo e($podcast->title); ?>"><?php echo e($podcast->title); ?></h1>
                            <?php if(!$podcast->visibility): ?><span class="private" data-translate-text="PRIVATE"><?php echo e(__('web.PRIVATE')); ?></span><?php endif; ?>
                            <div class="byline">
                                <?php if(isset($podcast->artist)): ?>
                                    <span class="byline">by <a href="<?php echo e($podcast->artist->permalink_url); ?>" class="artist-link artist" title="<?php echo e($podcast->artist->name); ?>"><?php echo e($podcast->artist->name); ?></a></span>
                                <?php endif; ?>
                            </div>
                            <div class="actions-primary">
                                <?php if(! auth()->check() || (auth()->check() && isset(auth()->user()->artist_id) && auth()->user()->artist_id != $podcast->artist->id)): ?>
                                    <a class="btn btn-favorite favorite <?php if($podcast->favorite): ?> on <?php endif; ?>" data-type="podcast" data-id="<?php echo e($podcast->id); ?>" data-title="<?php echo e($podcast->title); ?>" data-url="<?php echo e($podcast->permalink_url); ?>" data-text-on="<?php echo e(__('web.PLAYLIST_UNSUBSCRIBE')); ?>" data-text-off="<?php echo e(__('web.PLAYLIST_SUBSCRIBE')); ?>">
                                        <svg class="off" height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                                        <svg class="on" height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"/><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                                        <?php if($podcast->favorite): ?>
                                            <span class="label" data-translate-text="PLAYLIST_UNSUBSCRIBE"><?php echo e(__('web.PLAYLIST_UNSUBSCRIBE')); ?></span>
                                        <?php else: ?>
                                            <span class="label" data-translate-text="PLAYLIST_SUBSCRIBE"> <?php echo e(__('web.PLAYLIST_SUBSCRIBE')); ?> </span>
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                                <a class="btn share desktop" data-type="podcast" data-id="<?php echo e($podcast->id); ?>">
                                    <svg height="26" viewBox="0 0 24 24" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"/><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg>
                                    <span data-translate-text="SHARE"><?php echo e(__('web.SHARE')); ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="podcast-artwork-caption text-secondary desktop">
                            <div class="podcast-total-episodes">
                                <?php echo e($podcast->episodes->total()); ?> <?php echo e(__('web.EPISODES')); ?>

                            </div>
                            <a class="podcast-report d-flex align-items-center text-secondary" data-action="report" data-type="podcast" data-id="<?php echo e($podcast->id); ?>">
                                <span data-translate-text="REPORT">Report</span>
                            </a>
                        </div>
                    </div>
                    <div class="podcast-description">
                        <?php echo e($podcast->description); ?>

                    </div>
                    <div class="podcast-comments">
                        <?php if($podcast->allow_comments): ?>
                            <?php echo $__env->make('comments.index', ['object' => (Object) ['id' => $podcast->id, 'type' => 'App\Models\Podcast', 'title' => $podcast->title]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <p class="text-center mt-5">Comments are turned off.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="inner desktop">
                        <h1 title="<?php echo e($podcast->title); ?>"><?php echo e($podcast->title); ?></h1>
                        <?php if(!$podcast->visibility): ?><span class="private" data-translate-text="PRIVATE"><?php echo e(__('web.PRIVATE')); ?></span><?php endif; ?>
                        <div class="byline">
                            <?php if(isset($podcast->artist)): ?>
                                <span class="byline">by <a href="<?php echo e($podcast->artist->permalink_url); ?>" class="artist-link artist" title="<?php echo e($podcast->artist->name); ?>"><?php echo e($podcast->artist->name); ?></a></span>
                            <?php endif; ?>
                        </div>
                        <div class="actions-primary">
                            <?php if(! auth()->check() || (auth()->check() && isset(auth()->user()->artist_id) && auth()->user()->artist_id != $podcast->artist->id)): ?>
                                <a class="btn btn-favorite favorite <?php if($podcast->favorite): ?> on <?php endif; ?>" data-type="podcast" data-id="<?php echo e($podcast->id); ?>" data-title="<?php echo e($podcast->title); ?>" data-url="<?php echo e($podcast->permalink_url); ?>" data-text-on="<?php echo e(__('web.PLAYLIST_UNSUBSCRIBE')); ?>" data-text-off="<?php echo e(__('web.PLAYLIST_SUBSCRIBE')); ?>">
                                    <svg class="off" height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                                    <svg class="on" height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"/><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                                    <?php if($podcast->favorite): ?>
                                        <span class="label desktop" data-translate-text="PLAYLIST_UNSUBSCRIBE"><?php echo e(__('web.PLAYLIST_UNSUBSCRIBE')); ?></span>
                                    <?php else: ?>
                                        <span class="label desktop" data-translate-text="PLAYLIST_SUBSCRIBE"> <?php echo e(__('web.PLAYLIST_SUBSCRIBE')); ?> </span>
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                            <a class="btn share desktop" data-type="podcast" data-id="<?php echo e($podcast->id); ?>">
                                <svg height="26" viewBox="0 0 24 24" width="14" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"/><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg>
                                <span class="desktop" data-translate-text="SHARE"><?php echo e(__('web.SHARE')); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="episodes-container">
                        <div id="songs-grid" class="no-podcast-column profile">
                            <?php echo $__env->make('commons.episode', ['episodes' => $podcast->episodes, 'element' => 'genre'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="show-more-songs-wrapper">
                            <a id="show-more-songs" class="hide" data-translate-text="SHOW_MORE_SONGS"><?php echo e(__('web.SHOW_MORE_SONGS')); ?></a>
                        </div>
                        <div id="extra-grid" class="no-podcast-column profile"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/podcast/index.blade.php ENDPATH**/ ?>