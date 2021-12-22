<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('homepage.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       
        <div class="container-fluid px-3">
        <div class="row d-flex  justify-content-lg-between">
            <!-- starting Offer Slider-->
            <div class="col-md-5 starting-head">
                <?php if(auth()->check()): ?>
                <h4>
                    <span>
                      <img width="28" height="28" style="border-radius: 15px;" src="<?php echo auth()->user()->artwork_url; ?>">
                    </span> 
                    <?php echo e(__('web.WELCOME_BACK', ['name' => auth()->user()->name])); ?>

                </h4>
                <?php endif; ?>
                <h2>What's Hot<br>This Weekend</h2>
                <p>ACCORDING TO WIKIPEDIA, A PARAGRAPH IS A SELF-CO NTAINED UNIT OF A DISCOURSE IN WRITING DEALING WITH A
                    PARTICULAR POINT OR IDEA. A PARAGRAPH CONSISTS OF ONE OR MORE SENTENCES.</p>

            </div>
            <!-- end Offer-->

            <!-- left corner Section-->
                        <div class="col-lg-3 col-md-3 col-sm-5 listing pt-4">
                <ul>
                    <li>0 Songs</li>
                    <li>0 Favorites</li>
                    <li>2 Playlists</li>
                    <li>1 Following</li>
                    <li>0 Followers</li>
                </ul>
            </div>
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
    <?php echo Advert::get('footer'); ?>

    <?php echo $__env->make('homepage.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/homepage/index.blade.php ENDPATH**/ ?>