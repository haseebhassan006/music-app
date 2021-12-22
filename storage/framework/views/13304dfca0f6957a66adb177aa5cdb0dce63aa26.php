
<div class="container-fluid">
    <div class="row trndg">
    <?php if(count($songs)>=6): ?>
        <div class="col-lg-4 trd">
            <h2>TRENDING</h2>
            <div class="trd-bg">
                <table>
                    <?php
                        $count = 0;
                        $count_new = 0;
                    ?>
                    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($song->title) && $count < 6 ): ?>
                        <script>var song_data_<?php echo e($song->id); ?> = <?php echo json_encode($song); ?></script>
                        <tr>
                            <td><img width="35" height="35" src="<?php echo e($song->artwork_url); ?>"></td>
                            <td>0<?php echo e($index +1); ?> 
                                <a class="btn play play-lg play-object" data-type="song" data-id="<?php echo e($song->id); ?>">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td><?php echo $song->title; ?></td>
                            <?php $__currentLoopData = $song->artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo $artist->name; ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e(humanTime($song->duration)); ?></td>
                        </tr>
                        <?php else: ?>
                            <?php break; ?>
                        <?php endif; ?>
                        <?php ($count++); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>

        <div class="col-lg-4 mx-3 trd">
            <h2>TRENDING</h2>
            <div class="trd-bg">
                <table>
                    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($song->title) && $count_new >= $count ): ?>
                        <script>var song_data_<?php echo e($song->id); ?> = <?php echo json_encode($song); ?></script>
                        <tr>
                            <td><img width="35" height="35" src="<?php echo e($song->artwork_url); ?>"></td>
                            <td>0<?php echo e($index +1); ?> 
                                <a class="btn play play-lg play-object" data-type="song" data-id="<?php echo e($song->id); ?>">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td><?php echo $song->title; ?></td>
                            <?php $__currentLoopData = $song->artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo $artist->name; ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e(humanTime($song->duration)); ?></td>
                        </tr>
                        <?php endif; ?>
                    <?php ($count_new++); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="col-lg-4 trd">
            <h2>TRENDING</h2>
            <div class="trd-bg">
                <table>
                    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($song->title)): ?>
                        <script>var song_data_<?php echo e($song->id); ?> = <?php echo json_encode($song); ?></script>
                        <tr>
                            <td><img width="35" height="35" src="<?php echo e($song->artwork_url); ?>"></td>
                            <td>0<?php echo e($index +1); ?> 
                                <a class="btn play play-lg play-object" data-type="song" data-id="<?php echo e($song->id); ?>">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td><?php echo str_limit($song->title, 18); ?></td>
                            <?php $__currentLoopData = $song->artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo str_limit($artist->name, 8); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e(humanTime($song->duration)); ?></td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    <?php endif; ?>
    </div>
</div><?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views\frontend\default/commons/songs-trending.blade.php ENDPATH**/ ?>