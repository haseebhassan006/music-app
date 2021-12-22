<?php $__env->startSection('pagination'); ?>
    <?php if(isset($browse->podcasts)): ?>
        <?php echo $__env->make('commons.podcast', ['podcasts' => $browse->podcasts, 'element' => 'genre'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="page-content">
        <div class="container">
            <div class="page-header tag-header small desktop">
                <div class="inner">
                    <?php if(isset($browse->category)): ?>
                        <h1>
                            <span title="<?php echo e($browse->category->name); ?>"><?php echo e($browse->category->name); ?></span>
                        </h1>
                        <div class="byline"><a href="<?php echo e(route('frontend.podcasts')); ?>"><span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span></a></div>
                    <?php endif; ?>
                    <?php if(Route::currentRouteName() == 'frontend.podcasts.browse.by.region'): ?>
                        <h1>
                            <span title="<?php echo e($browse->region->name); ?>"><?php echo e($browse->region->name); ?></span>
                        </h1>
                        <div class="byline">
                            <a href="<?php echo e(route('frontend.podcasts.browse.regions')); ?>"><span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span></a>
                        </div>
                        <?php elseif(Route::currentRouteName() == 'frontend.podcasts.browse.regions'): ?>
                            <h1>
                                <span title="By location">By location</span>
                            </h1>
                            <div class="byline">
                                <a href="<?php echo e(route('frontend.podcasts')); ?>"><span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span></a>
                            </div>
                        <?php elseif(Route::currentRouteName() == 'frontend.podcasts.browse.countries'): ?>
                            <h1>
                                <span title="By countries">By countries</span>
                            </h1>
                            <div class="byline">
                                <a href="<?php echo e(route('frontend.podcasts')); ?>"><span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span></a>
                            </div>
                    <?php elseif(Route::currentRouteName() == 'frontend.podcasts.browse.by.country'): ?>
                        <h1>
                            <span title="<?php echo e($browse->country->name); ?>"><?php echo e($browse->country->name); ?></span>
                        </h1>
                        <div class="byline">
                            <a href="<?php echo e(route('frontend.podcasts.browse.countries')); ?>"><span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span></a>
                        </div>
                    <?php elseif(Route::currentRouteName() == 'frontend.podcasts.browse.by.language'): ?>
                        <h1>
                            <span title="<?php echo e($browse->language->name); ?>"><?php echo e($browse->language->name); ?></span>
                        </h1>
                        <div class="byline">
                            <a href="<?php echo e(route('frontend.podcasts')); ?>"><span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span></a>
                        </div>
                    <?php elseif(Route::currentRouteName() == 'frontend.podcasts.browse.by.city'): ?>
                        <h1>
                            <span title="<?php echo e($browse->city->name); ?>"><?php echo e($browse->city->name); ?></span>
                        </h1>
                        <div class="byline">
                            <a href="<?php echo e(route('frontend.podcasts.browse.by.country', ['code' => $browse->city->country->code])); ?>"><span data-translate-text="SEE_ALL"><?php echo e(__('web.SEE_ALL')); ?></span></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(isset($browse->slides)): ?>
                <?php echo $__env->make('commons.slideshow', ['slides' => $browse->slides], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(isset($browse->channels)): ?>
                <?php echo $__env->make('commons.channel', ['channels' => $browse->channels], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(isset($browse->regions) && count($browse->regions)): ?>
                <div class="content home-section">
                    <div class="sub-header">
                        <h2 class="section-title">
                            <span data-translate-text="">By regions</span>
                        </h2>
                    </div>
                    <div class="home-content-container ml-0 mr-0">
                        <ul class="tag-cloud-container">
                            <?php $__currentLoopData = $browse->regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="tag-cloud-item" href="<?php echo e(route('frontend.podcasts.browse.by.region', ['slug' => $item->alt_name])); ?>" title="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($browse->countries) && count($browse->countries)): ?>
                <div class="content home-section">
                    <div class="sub-header">
                        <h2 class="section-title">
                            <span data-translate-text="">By country</span>
                        </h2>
                    </div>
                    <div class="home-content-container ml-0 mr-0">
                        <ul class="tag-cloud-container">
                            <?php $__currentLoopData = $browse->countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="tag-cloud-item" href="<?php echo e(route('frontend.podcasts.browse.by.country', ['code' => $country->code])); ?>" title="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($browse->languages) && count($browse->languages)): ?>
                <div class="content home-section">
                    <div class="sub-header">
                        <h2 class="section-title">
                            <span data-translate-text="">By languages</span>
                        </h2>
                    </div>
                    <div class="home-content-container ml-0 mr-0">
                        <ul class="tag-cloud-container">
                            <?php $__currentLoopData = $browse->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="tag-cloud-item" href="<?php echo e(route('frontend.podcasts.browse.by.language', ['id' => $language->id])); ?>" title="<?php echo e($language->name); ?>"><?php echo e($language->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($browse->podcasts)): ?>
                <?php echo $__env->make('commons.toolbar.podcast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div id="shows-grid" class="grid-view items-filter-able infinity-load-more">
                    <?php echo $__env->yieldContent('pagination'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/podcasts/browse.blade.php ENDPATH**/ ?>