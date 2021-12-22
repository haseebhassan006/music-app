<?php $__env->startSection('pagination'); ?>
    <?php if($channel->object_type == 'song'): ?>
        <?php echo $__env->make('commons.song', ['songs' => $channel->objects, 'element' => 'genre'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($channel->object_type == 'artist'): ?>
        <?php echo $__env->make('commons.artist', ['artists' => $channel->objects, 'element' => 'collection'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($channel->object_type == 'album'): ?>
        <div class="row media-row">
            <?php echo $__env->make('commons.album', ['albums' => $channel->objects, 'element' => 'grid'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php elseif($channel->object_type == 'playlist'): ?>
        <?php echo $__env->make('commons.playlist', ['playlists' => $channel->objects, 'element' => null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($channel->object_type == 'station'): ?>
        <?php echo $__env->make('commons.station', ['stations' => $channel->objects, 'element' => 'carousel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($channel->object_type == 'user'): ?>
        <?php echo $__env->make('commons.user', ['users' => $channel->objects, 'element' => 'grid'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($channel->object_type == 'podcast'): ?>
        <div class="row media-row">
            <?php echo $__env->make('commons.podcast', ['podcasts' => $channel->objects, 'element' => 'grid'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo Advert::get('header'); ?>

    <div id="page-content">
        <div class="container">
            <div class="page-header no-separator desktop">
                <div id="primary-actions">
                    <a class="btn play-station" data-type="channel" data-id="<?php echo e($channel->id); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"/><circle cx="6.18" cy="17.82" r="2.18"/><path d="M4 4.44v2.83c7.03 0 12.73 5.7 12.73 12.73h2.83c0-8.59-6.97-15.56-15.56-15.56zm0 5.66v2.83c3.9 0 7.07 3.17 7.07 7.07h2.83c0-5.47-4.43-9.9-9.9-9.9z"/></svg><span data-translate-text="START_STATION"><?php echo e(__('web.START_STATION')); ?></span>
                    </a>
                </div>
                <h1><?php echo e($channel->title); ?></h1>
                <div class="byline"><span><?php echo e($channel->description); ?></span></div>
            </div>
            <div id="column1" class="full">
                <?php if($channel->object_type == 'song'): ?>
                    <?php echo $__env->make('commons.toolbar.song', ['type' => 'channel', 'id' => $channel->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($channel->object_type == 'station'): ?>
                    <?php echo $__env->make('commons.toolbar.station', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <div <?php if($channel->object_type == 'song'): ?> id="songs-grid" <?php endif; ?> class="infinity-load-more items-sort-able <?php if($channel->object_type == 'playlist' || $channel->object_type == 'user'): ?> playlists-grid <?php endif; ?>">
                    <?php echo $__env->yieldContent('pagination'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo Advert::get('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/channel/index.blade.php ENDPATH**/ ?>