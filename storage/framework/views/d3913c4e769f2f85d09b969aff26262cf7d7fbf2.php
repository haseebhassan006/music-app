<div id="page-nav">
    <div class="outer">
        <ul>
            <li><a href="<?php echo e($artist->permalink_url); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.artist'): ?> active <?php endif; ?>" data-translate-text="OVERVIEW">Overview<div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.artist.albums', ['id' => $artist->id, 'slug' => str_slug($artist->name)])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.artist.albums'): ?> active <?php endif; ?>" data-translate-text="ALBUMS">Albums<div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.artist.podcasts', ['id' => $artist->id, 'slug' => str_slug($artist->name)])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.artist.podcasts'): ?> active <?php endif; ?>" data-translate-text="PODCASTS">Podcasts<div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.artist.similar', ['id' => $artist->id, 'slug' => str_slug($artist->name)])); ?>" class="page-nav-link  <?php if(Route::currentRouteName() == 'frontend.artist.similar'): ?> active <?php endif; ?>" data-translate-text="SIMILAR_ARTISTS">Related Artists<div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.artist.followers', ['id' => $artist->id, 'slug' => str_slug($artist->name)])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.artist.followers'): ?> active <?php endif; ?>" data-translate-text="FOLLOWERS">Followers<div class="arrow"></div></a></li>
            <li><a href="<?php echo e(route('frontend.artist.events', ['id' => $artist->id, 'slug' => str_slug($artist->name)])); ?>" class="page-nav-link <?php if(Route::currentRouteName() == 'frontend.artist.events'): ?> active <?php endif; ?>" data-translate-text="EVENTS">Events<div class="arrow"></div></a></li>
        </ul>
    </div>
</div>
<script>var artist_data_<?php echo e($artist->id); ?> = <?php echo json_encode($artist->makeHidden('songs')->makeHidden('activities')); ?></script>
<?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views\frontend\default/artist/nav.blade.php ENDPATH**/ ?>