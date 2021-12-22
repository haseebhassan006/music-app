<?php $__env->startSection('content'); ?>
    <?php echo Advert::get('header'); ?>

    <div id="page-content" class="home">
        <div class="page-header no-separator desktop">
            <h1 data-translate-text="RADIO"><?php echo e(__('web.RADIO')); ?></h1>
            <div class="byline">
                <span>Listen to live radio stations worldwide.</span>
            </div>
        </div>
        <div id="column1" class="full">
            <?php echo $__env->make('commons.slideshow', ['slides' => $slides, 'style' => 'featured'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('commons.channel', ['channels' => $channels], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="content home-section">
                <div class="sub-header">
                    <h2 class="section-title">
                        <span data-translate-text="">Categories</span>
                    </h2>
                </div>
                <div class="home-content-container ml-0 mr-0">
                    <div id="grid" class="genre">
                        <?php $__currentLoopData = $radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="module module-cell small-radio-cat">
                                <div class="img-container" style="background: url(<?php echo e($genre->artwork_url); ?>)">
                                    <div class="module-inner">
                                        <a class="title" href="<?php echo e($genre->permalink_url); ?>" title="<?php echo e($genre->name); ?>">
                                            <span><?php echo e($genre->name); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <?php if(isset($radio->regions) && count($radio->regions)): ?>
                <div class="content home-section">
                    <div class="sub-header">
                        <h2 class="section-title">
                            <span data-translate-text="">By location</span>
                        </h2>
                    </div>
                    <div class="home-content-container ml-0 mr-0">
                        <ul class="tag-cloud-container">
                            <?php $__currentLoopData = $radio->regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="tag-cloud-item" href="<?php echo e(route('frontend.radio.browse.by.region', ['slug' => $item->alt_name])); ?>" title="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($radio->countries) && count($radio->countries)): ?>
                <div class="content home-section">
                    <div class="sub-header">
                        <h2 class="section-title">
                            <span data-translate-text="">By country</span>
                        </h2>
                        <div class="actions-primary">
                            <a class="btn" href="<?php echo e(route('frontend.radio.browse.countries')); ?>">
                                <span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="home-content-container ml-0 mr-0">
                        <div id="grid" class="genre">
                            <?php $__currentLoopData = $radio->countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="module module-cell small-radio-cat">
                                    <div class="img-container" style="background: url(<?php echo e($item->artwork_url); ?>)">
                                        <div class="module-inner">
                                            <a class="title" href="<?php echo e(route('frontend.radio.browse.by.country', ['code' => $item->code])); ?>" title="<?php echo e($item->name); ?>">
                                                <span><?php echo e($item->name); ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($radio->cities) && count($radio->cities)): ?>
                <div class="content home-section">
                    <div class="sub-header">
                        <h2 class="section-title">
                            <span data-translate-text="">By city</span>
                        </h2>
                    </div>
                    <div class="home-content-container ml-0 mr-0">
                        <ul class="tag-cloud-container">
                            <?php $__currentLoopData = $radio->cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="tag-cloud-item" href="<?php echo e(route('frontend.radio.browse.by.city', ['id' => $item->id])); ?>" title="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>


            <?php if(isset($radio->languages) && count($radio->languages)): ?>
                <div class="content home-section">
                    <div class="sub-header">
                        <h2 class="section-title">
                            <span data-translate-text="">By languages</span>
                        </h2>
                        <div class="actions-primary">
                            <a class="btn" href="<?php echo e(route('frontend.radio.browse.languages')); ?>">
                                <span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="home-content-container ml-0 mr-0">
                        <ul class="tag-cloud-container">
                            <?php $__currentLoopData = $radio->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="tag-cloud-item" href="<?php echo e(route('frontend.radio.browse.by.language', ['id' => $item->id])); ?>" title="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php echo Advert::get('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/radio/index.blade.php ENDPATH**/ ?>