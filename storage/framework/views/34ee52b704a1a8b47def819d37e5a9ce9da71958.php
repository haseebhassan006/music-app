<?php if(isset($channels) && count($channels)): ?>
    <?php
        $count = 0;
    ?>
    <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($channel->objects != null): ?>

        
            <div class="row trd-lin">
                <div class="col-lg-12 px-1 py-0 titl">
                    <h2><?php echo e($channel->title); ?></h2>
                    <div class="play-slider swiper">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $channel->objects->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <script>var album_data_<?php echo e($album->id); ?> = <?php echo json_encode($album); ?></script>
                            <div class="swiper-slide slidinz" data-toggle="contextmenu" data-trigger="right" data-type="album" data-id="<?php echo e($album->id); ?>">
                                <div class="testimonial-item">
                                    <img src="<?php echo e($album->artwork_url); ?>" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            
                                        </ul>
                                    </div>
                                    <a class="overlay-link" href="<?php echo e($album->permalink_url); ?>"><h6> <?php echo e((isset($album->name)) ? str_limit($album->name, 8) : ''); ?></h6></a>
                                    
        
                                </div>
                            </div><!-- End song item -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        
        

        <?php endif; ?>
        <?php
            $count++;
        ?>
        <?php if($count == 2): ?>
            <?php break; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views\frontend\default/commons/channel-new.blade.php ENDPATH**/ ?>