<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('profile.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="page-content">
        <div class="container">
            <div class="page-header user main  small">
                <div class="img"><img src="<?php echo e($profile->artwork_url); ?>" alt="<?php echo e($profile->name); ?>" width="40"></div>
                <div class="inner">
                    <h1 title="<?php echo e($profile->username); ?>" class=""><?php echo e($profile->name); ?><span class="subpage-header"> / Followers</span></h1>
                    <?php if(isset($profile->group->role_id)): ?>
                        <div class="byline"><span><?php echo $profile->group->role->name; ?></span></div>
                    <?php endif; ?>
                </div>
            </div>
            <div id="column1" class="full">
                <?php if(count($profile->followers)): ?>
                    <div class="content">
                        <div class="row">
                            <?php echo $__env->make('commons.user', ['users' => $profile->followers, 'element' => 'profile'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="empty-page following">
                        <div class="empty-inner">
                            <?php if(auth()->check() && auth()->user()->username == $profile->username): ?>
                                <h2 data-translate-text="EMPTY_FOLLOWERS_OWNER"><?php echo e(__('web.EMPTY_FOLLOWERS_OWNER')); ?></h2>
                                <p data-translate-text="EMPTY_FOLLOWERS_DESC_OWNER"><?php echo e(__('web.EMPTY_FOLLOWERS_DESC_OWNER')); ?></p>
                            <?php else: ?>
                                <h2 data-translate-text="EMPTY_FOLLOWERS"><?php echo e(__('web.EMPTY_FOLLOWERS', ['name' => $profile->name])); ?></h2>
                                <p data-translate-text="EMPTY_FOLLOWERS_DESC"><?php echo e(__('web.EMPTY_COLLECTION_DESC')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/profile/followers.blade.php ENDPATH**/ ?>