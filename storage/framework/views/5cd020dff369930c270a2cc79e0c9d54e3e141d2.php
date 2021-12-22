<?php $__env->startSection('content'); ?>
    <div id="page-content" class="blogs">
        <div id="blogs">
            <h1 class="recent hide"><?php echo e(__('web.HOME_BLOG')); ?></h1>
            <div class="blogs-catalogs">
                <div id="column1">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($post->fixed): ?>
                            <div class="article-catalog fixed">
                                <div class="article-category">
                                    <span>in</span>
                                    <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <a href="<?php echo e(route('frontend.blog.category', ['category' => $category->alt_name])); ?>"><?php echo e($category->name); ?></a><?php if(!$loop->last): ?>, <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <a href="<?php echo e($post->permalink_url); ?>" class="article-title"><?php echo e($post->title); ?></a>
                                <div class="article-meta">
                                    <a class="article-publish" href="<?php echo e(route('frontend.blog.browse.by.day', ['year' =>  \Carbon\Carbon::parse($post->created_at)->format('Y'), 'month' => \Carbon\Carbon::parse($post->created_at)->format('m'), 'day' => \Carbon\Carbon::parse($post->created_at)->format('d')])); ?>"><?php echo e(\Carbon\Carbon::parse($post->created_at)->format(config('settings.post_time_format'))); ?></a>
                                    <a class="article-comments" href="<?php echo e($post->permalink_url); ?>" class="article-title">Comments (<?php echo e($post->comment_count); ?>)</a>
                                </div>
                                <div class="article-content">
                                    <?php if($post->getFirstMediaUrl('artwork')): ?>
                                        <a href="<?php echo e($post->permalink_url); ?>" class="article-title">
                                            <div class="img-container">
                                                <img src="<?php echo e($post->getFirstMediaUrl('artwork', 'thumbnail')); ?>" alt="<?php echo e($post->title); ?>">
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                    <div class="article-inner">
                                        <p class="article-description"><?php echo $post->short_content; ?></p>
                                    </div>
                                    <a href="<?php echo e($post->permalink_url); ?>" class="btn btn-primary btn-secondary">Read More</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="article-catalog">
                                <div class="article-content">
                                    <?php if($post->getFirstMediaUrl('artwork')): ?>
                                        <a href="<?php echo e($post->permalink_url); ?>" class="article-title">
                                            <div class="img-container">
                                                <img src="<?php echo e($post->getFirstMediaUrl('artwork', 'thumbnail')); ?>" alt="<?php echo e($post->title); ?>">
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                    <div class="article-inner">
                                        <a href="<?php echo e($post->permalink_url); ?>" class="article-title"><?php echo e($post->title); ?></a>
                                        <div class="article-details">
                                            <a href="/<?php echo e($post->user->username); ?>" class="article-author"><?php echo e($post->user->name); ?></a>
                                            <a class="article-publish"><?php echo e(\Carbon\Carbon::parse($post->created_at)->format('F j Y')); ?></a>
                                            <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><a class="article-category" href="<?php echo e(route('frontend.blog.category', ['category' => $category->alt_name])); ?>"><?php echo e($category->name); ?></a><?php if(!$loop->last): ?>, <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <p class="article-description"><?php echo $post->short_content; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div id="column2">
                    <?php echo Advert::get('sidebar'); ?>

                    <?php echo $__env->make('post.widget.categories', ['categories' => $categories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('post.widget.archives', ['archives' => $archives], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('post.widget.tags', ['tags' => $tags], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/post/index.blade.php ENDPATH**/ ?>