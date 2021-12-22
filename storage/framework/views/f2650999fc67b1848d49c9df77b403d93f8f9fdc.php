
<?php $__env->startSection('content'); ?>
    <div class="container-fluid px-3">
        <div class="row d-flex  justify-content-lg-between">
            <!-- starting Offer Slider-->
            <div class="col-md-5 starting-head">
                <?php if(auth()->check()): ?>
                    <h4><span><img width="28" height="28" style="border-radius: 15px;" src="<?php echo auth()->user()->artwork_url; ?>"></span> <?php echo e(__('web.WELCOME_BACK', ['name' => auth()->user()->name])); ?></h4>
                <?php endif; ?>
                <h2>What's Hot<br>This Weekend</h2>
                <p>ACCORDING TO WIKIPEDIA, A PARAGRAPH IS A SELF-CO NTAINED UNIT OF A DISCOURSE IN WRITING DEALING WITH A
                    PARTICULAR POINT OR IDEA. A PARAGRAPH CONSISTS OF ONE OR MORE SENTENCES.</p>
            </div>
            <!-- end Offer-->

            <!-- left corner Section-->
            <?php if(auth()->check()): ?>
            <div class="col-lg-3 col-md-3 col-sm-5 listing pt-4">
                <ul>
                    <li><?php echo e(auth()->user()->collection_count); ?> <?php echo e(__('web.SONGS')); ?></li>
                    <li><?php echo e(auth()->user()->favorite_count); ?> <?php echo e(__('web.FAVORITES')); ?></li>
                    <li><?php echo e(auth()->user()->playlist_count); ?> <?php echo e(__('web.PLAYLISTS')); ?></li>
                    <li><?php echo e(auth()->user()->following_count); ?> <?php echo e(__('web.FOLLOWING')); ?></li>
                    <li><?php echo e(auth()->user()->follower_count); ?> <?php echo e(__('web.FOLLOWERS')); ?></li>
                </ul>
            </div>
            <?php endif; ?>
            <!-- End -->
        </div>
    </div>
    <div id="page-content">
        
        
        
        <?php if(isset($home->recentListens) && count($home->recentListens)): ?>
        
            <?php echo $__env->make('commons.song-new', ['songs' => $home->recentListens, 'element' => 'carousel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>
        
        <?php if(isset($home->popularSongs) && count($home->popularSongs)): ?>
            <?php echo $__env->make('commons.songs-trending', ['songs' => $home->popularSongs, 'element' => 'carousel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        
        
        <div class="container-fluid" style="background-color:#000;">
            <?php echo $__env->make('commons.channel-new', ['channels' => $home->channels], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index_latest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views\frontend\default/homepage/index_latest.blade.php ENDPATH**/ ?>