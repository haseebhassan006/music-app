<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('homepage.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="page-content">
        <div class="page-header no-separator desktop">
            <h1 data-translate-text="DISCOVER"><?php echo e(__('web.DISCOVER')); ?></h1>
        </div>
        <div id="column1" class="full">
            <?php echo $__env->make('commons.slideshow', ['slides' => $discover->slides], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="content home-section">
                <div class="sub-header">
                    <h2 class="section-title">
                        <span data-translate-text="MUSIC_BY_GENRE">Music by genre</span>
                    </h2>
                </div>
                <div id="grid" class="genre">
                    <?php $__currentLoopData = $discover->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="module module-cell genre grid-item">
                            <div class="img-container" style="background: url(<?php echo e($genre->artwork_url); ?>)">
                                <div class="module-inner">
                                    <a class="title" href="<?php echo e($genre->permalink_url); ?>" title="<?php echo $genre->name; ?>">
                                        <span><?php echo $genre->name; ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="content home-section">
                <div class="sub-header">
                    <h2 class="section-title">
                        <span data-translate-text="MUSIC_BY_MOOD">Music by mood</span>
                    </h2>
                </div>
                <div id="grid" class="genre">
                    <?php $__currentLoopData = $discover->moods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $mood): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="module module-cell genre grid-item">
                            <div class="img-container" style="background: url(<?php echo e($mood->artwork_url); ?>)">
                                <div class="module-inner">
                                    <a class="title" href="<?php echo e($mood->permalink_url); ?>" title="<?php echo $mood->name; ?>">
                                        <span><?php echo $mood->name; ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php echo $__env->make('commons.channel', ['channels' => $discover->channels], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php echo Advert::get('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views\frontend\default/discover/index.blade.php ENDPATH**/ ?>