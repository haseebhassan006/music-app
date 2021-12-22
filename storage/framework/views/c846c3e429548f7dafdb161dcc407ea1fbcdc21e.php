
 
<div class="container-fluid">
            <!-- slider song -->   
            <div class="sldr">       
              <div class="row trd-lin btm-line px-1"> 
                <div class="col-lg-12 p-0">
                  <div class="song-slider swiper">
                    <div class="swiper-wrapper">
                    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($song->title)): ?>
                        <script>var song_data_<?php echo e($song->id); ?> = <?php echo json_encode($song); ?></script>
                    <div class="swiper-slide slidinz">
                      <a href="">
                       <table>
                        <tr>
                        <td><img src="<?php echo e($song->artwork_url); ?>" width="40"></td> 
                          <td><i class="fas fa-play" aria-hidden="true"></i></td>                          
                          <td>
                          <h6><?php echo str_limit($song->title, 10); ?></h6>                            <p>Harmony</p>
                        
                          <?php $__currentLoopData = $song->artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <p><?php echo str_limit($artist->name, 8); ?></p>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </td>
                          <td class="tim"><?php echo e(humanTime($song->duration)); ?></td>
                        </tr>
                       </table>
                      </a>
                    </div><!-- End song item -->
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- <div class="swiper-slide slidinz">
                      <a href="">
                       <table>
                        <tr>
                          <td><img src="assets/img/song1.png" width="40"></td> 
                          <td><i class="fa fa-play" aria-hidden="true"></i></td>                          
                          <td>
                            <h6>what works for me</h6>
                            <p>Harmony</p>
                          </td>
                          <td class="tim">5.89</td>
                        </tr>
                       </table>
                      </a>
                    </div><!-- End song item -->
                    <!-- <div class="swiper-slide slidinz">
                      <a href="">
                       <table>
                        <tr>
                          <td><img src="assets/img/song3.png" width="40"></td> 
                          <td><i class="fa fa-play" aria-hidden="true"></i></td>                          
                          <td>
                            <h6>what works for me</h6>
                            <p>Harmony</p>
                          </td>
                          <td class="tim">5.89</td>
                        </tr>
                       </table>
                      </a>
                    </div>End song item -->
                    <!-- <div class="swiper-slide slidinz">
                      <a href="">
                       <table>
                        <tr>
                          <td><img src="assets/img/song2.png" width="40"></td> 
                          <td><i class="fa fa-play" aria-hidden="true"></i></td>                          
                          <td>
                            <h6>what works for me</h6>
                            <p>Harmony</p>
                          </td>
                          <td class="tim">5.89</td>
                        </tr>
                       </table>
                      </a>
                    </div>End song item -->
                    <!-- <div class="swiper-slide slidinz">
                      <a href="">
                       <table>
                        <tr>
                          <td><img src="assets/img/song4.png" width="40"></td> 
                          <td><i class="fa fa-play" aria-hidden="true"></i></td>                          
                          <td>
                            <h6>what works for me</h6>
                            <p>Harmony</p>
                          </td>
                          <td class="tim">5.89</td>
                        </tr>
                       </table>
                      </a>
                    </div>End song item -->
                    <div class="swiper-slide slidinz">
                      <a href="">
                       <table>
                        <tr>
                          <td><img src="assets/img/song3.png" width="40"></td> 
                          <td><i class="fa fa-play" aria-hidden="true"></i></td>                         
                          <td>
                            <h6>what works for me</h6>
                            <p>Harmony</p>
                          </td>
                          <td class="tim">5.89</td>
                        </tr>
                       </table>
                      </a>
                    </div><!-- End song item -->
                    <div class="swiper-slide slidinz">
                      <a href="">
                       <table>
                        <tr>
                          <td><img src="assets/img/song2.png" width="40"></td> 
                          <td><i class="fa fa-play" aria-hidden="true"></i></td>                          
                          <td>
                            <h6>what works for me</h6>
                            <p>Harmony</p>
                          </td>
                          <td class="tim">5.89</td>
                        </tr>
                       </table>
                      </a>
                    </div><!-- End song item -->
                    <div class="swiper-slide slidinz">
                      <a href="">
                       <table>
                        <tr>
                          <td><img src="assets/img/song1.png" width="40"></td> 
                          <td><i class="fa fa-play" aria-hidden="true"></i></td>                          
                          <td>
                            <h6>what works for me</h6>
                            <p>Harmony</p>
                          </td>
                          <td class="tim">5.89</td>
                        </tr>
                       </table>
                      </a>
                    </div><!-- End song item -->
                    <div class="swiper-slide slidinz">
                      <a href="">
                       <table>
                        <tr>
                          <td><img src="assets/img/song4.png" width="40"></td>  
                          <td><i class="fa fa-play" aria-hidden="true"></i></td>                         
                          <td>
                            <h6>what works for me</h6>
                            <p>Harmony</p>
                          </td>
                          <td class="tim">5.89</td>
                        </tr>
                       </table>
                      </a>
                    </div>
                    </div>          
                  </div>
                </div>
              </div>
            </div>   
          </div>

<?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/commons/song-new.blade.php ENDPATH**/ ?>