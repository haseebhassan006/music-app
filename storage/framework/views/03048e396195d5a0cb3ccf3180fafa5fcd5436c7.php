<?php $__env->startSection('content'); ?>
    <div id="page-content">
        <div class="page-header no-separator desktop">
            <h1 data-translate-text="PODCASTS"><?php echo e(__('web.PODCASTS')); ?></h1>
            <div class="byline">
                <span data-translate-text="PODCASTS_TIP"><?php echo e(__('web.PODCASTS_TIP')); ?></span>
            </div>
        </div>
        <div id="column1" class="full">
            <?php echo $__env->make('commons.slideshow', ['slides' => $slides, 'style' => 'featured'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('commons.channel', ['channels' => $channels], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="content home-section">
                <div class="sub-header">
                    <h2 class="section-title">
                        <span data-translate-text="CATEGORIES"><?php echo e(__('web.CATEGORIES')); ?></span>
                    </h2>
                </div>
                <div class="home-content-container ml-0 mr-0">
                    <div id="grid" class="genre">
                        <?php $__currentLoopData = $podcasts->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="module module-cell small-radio-cat">
                                <div class="img-container" style="background: url(<?php echo e($category->artwork_url); ?>)">
                                    <div class="module-inner">
                                        <a class="title" href="<?php echo e($category->permalink_url); ?>" title="<?php echo e($category->name); ?>">
                                            <span><?php echo $category->name; ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <?php if(isset($podcasts->regions) && count($podcasts->regions)): ?>
                <div class="content home-section">
                    <div class="sub-header">
                        <h2 class="section-title">
                            <span data-translate-text="BY_LOCATION"><?php echo e(__('web.BY_LOCATION')); ?></span>
                        </h2>
                    </div>
                    <div class="home-content-container ml-0 mr-0">
                        <ul class="tag-cloud-container">
                            <?php $__currentLoopData = $podcasts->regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="tag-cloud-item" href="<?php echo e(route('frontend.podcasts.browse.by.region', ['slug' => $item->alt_name])); ?>" title="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($podcasts->countries) && count($podcasts->countries)): ?>
                <div class="content home-section">
                    <div class="sub-header">
                        <h2 class="section-title">
                            <span data-translate-text="BY_COUNTRY"><?php echo e(__('web.BY_COUNTRY')); ?></span>
                        </h2>
                        <div class="actions-primary">
                            <a class="btn" href="<?php echo e(route('frontend.podcasts.browse.countries')); ?>">
                                <span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="home-content-container ml-0 mr-0">
                        <div id="grid" class="genre">
                            <?php $__currentLoopData = $podcasts->countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="module module-cell small-radio-cat">
                                    <div class="img-container" style="background: url(<?php echo e($item->artwork_url); ?>)">
                                        <div class="module-inner">
                                            <a class="title" href="<?php echo e(route('frontend.podcasts.browse.by.country', ['code' => $item->code])); ?>" title="<?php echo e($item->name); ?>">
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
            <?php if(isset($podcasts->languages) && count($podcasts->languages)): ?>
                <div class="content home-section">
                    <div class="sub-header">
                        <h2 class="section-title">
                            <span data-translate-text="BY_LANGUAGE"><?php echo e(__('web.BY_LANGUAGE')); ?></span>
                        </h2>
                        <div class="actions-primary">
                            <a class="btn" href="<?php echo e(route('frontend.podcasts.browse.languages')); ?>">
                                <span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="home-content-container ml-0 mr-0">
                        <ul class="tag-cloud-container">
                            <?php $__currentLoopData = $podcasts->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="tag-cloud-item" href="<?php echo e(route('frontend.podcasts.browse.by.language', ['id' => $item->id])); ?>" title="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/podcasts/index.blade.php ENDPATH**/ ?>