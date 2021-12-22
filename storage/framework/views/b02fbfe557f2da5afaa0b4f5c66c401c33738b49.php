<?php if(isset($channels) && count($channels)): ?>
    <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($channel->objects != null): ?>
            <div class="content home-section">
                <div class="sub-header <?php if($channel->object_type == 'song'): ?> can-play <?php endif; ?>">
                    <?php if($channel->object_type == 'song'): ?>
                        <a class="btn btn-icon-only btn-rounded play-section play-now" data-target="#channel-<?php echo e($channel->id); ?>">
                            <svg height="40" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 5v14l11-7z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <h2 class="section-title">
                        <span data-translate-text=""><?php echo e($channel->title); ?></span>
                    </h2>
                    <?php if($channel->description): ?>
                        <span class="section-tagline"><?php echo e($channel->description); ?></span>
                    <?php endif; ?>
                    <div class="actions-primary">
                        <a class="btn" href="<?php echo e(route('frontend.channel', ['slug' => $channel->alt_name])); ?>">
                            <span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span>
                        </a>
                    </div>
                </div>
                <div class="home-content-container">
                    <div class="swiper-container-channel">
                        <div id="channel-<?php echo e($channel->id); ?>" class="swiper-wrapper">
                            <?php if($channel->object_type == 'song'): ?>
                                <?php echo $__env->make('commons.song', ['songs' => $channel->objects->data, 'element' => 'carousel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($channel->object_type == 'artist'): ?>
                                <?php echo $__env->make('commons.artist', ['artists' => $channel->objects->data, 'element' => 'carousel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($channel->object_type == 'album'): ?>
                                <?php echo $__env->make('commons.album', ['albums' => $channel->objects->data, 'element' => 'carousel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($channel->object_type == 'playlist'): ?>
                                <?php echo $__env->make('commons.playlist', ['playlists' => $channel->objects->data, 'element' => 'carousel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($channel->object_type == 'station'): ?>
                                <?php echo $__env->make('commons.station', ['stations' => $channel->objects->data, 'element' => 'carousel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($channel->object_type == 'user'): ?>
                                <?php echo $__env->make('commons.user', ['users' => $channel->objects->data, 'element' => 'carousel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($channel->object_type == 'podcast'): ?>
                                <?php echo $__env->make('commons.podcast', ['podcasts' => $channel->objects->data, 'element' => 'carousel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <a class="home-pageable-nav previous-pageable-nav swiper-arrow-left">
                        <div class="icon pagable-icon">
                            <svg height="16" viewBox="0 0 501.5 501.5" width="16" xmlns="http://www.w3.org/2000/svg"><g><path d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"></path></g></svg>
                        </div>
                    </a>
                    <a class="home-pageable-nav next-pageable-nav swiper-arrow-right">
                        <div class="icon pagable-icon">
                            <svg height="16" viewBox="0 0 501.5 501.5" width="16" xmlns="http://www.w3.org/2000/svg"><g><path d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"></path></g></svg>
                        </div>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/commons/channel.blade.php ENDPATH**/ ?>