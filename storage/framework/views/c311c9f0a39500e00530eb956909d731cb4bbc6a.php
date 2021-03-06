<div class="page-post-comment">
    <img class="user-comment-image" <?php if(auth()->check()): ?> src="<?php echo auth()->user()->artwork_url; ?>" <?php else: ?> src="<?php echo e(asset('common/default/user.png')); ?>" <?php endif; ?>>
    <form class="comment-form" method="post" action="<?php echo e(route('frontend.comments.add')); ?>" novalidate>
        <input type="hidden" name="commentable_type" value="<?php echo e($object->type); ?>">
        <input type="hidden" name="commentable_id" value="<?php echo e($object->id); ?>">
        <div class="comment-feed-msg" contenteditable="true" placeholder="Talk about <?php echo e($object->title); ?>..."></div>
        <a class="insert-emoji">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
            </svg>
        </a>
        <input type="submit" class="hide">
    </form>
</div>
<div class="more-comments hide">
    <span>View more comments</span>
    <div class="loading"></div>
</div>
<div data-comment-init="true" data-commentable-type="<?php echo e($object->type); ?>" data-commentable-id="<?php echo e($object->id); ?>" class="comments-grid" <?php if(isset($mod)): ?> data-mod="<?php echo e($mod); ?>" <?php endif; ?>></div>

<?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views\frontend\default/comments/index.blade.php ENDPATH**/ ?>