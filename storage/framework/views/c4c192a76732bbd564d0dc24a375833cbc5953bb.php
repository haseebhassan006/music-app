<?php if(\App\Models\Role::getValue($permission)): ?>
    <li class="nav-item <?php if(Request::route()->getName() == $route): ?> active <?php endif; ?>"><a class="nav-link" href="<?php echo e(route($route)); ?>"><i class="fas <?php echo e($icon); ?>"></i> <span><?php echo e($name); ?></span></a></li>
<?php endif; ?><?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views/backend/commons/sidebar-menu.blade.php ENDPATH**/ ?>