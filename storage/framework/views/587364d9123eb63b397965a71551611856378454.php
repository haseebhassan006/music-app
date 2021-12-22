<div id="grid-toolbar-container">
    <div class="grid-toolbar">
        <div class="grid-toolbar-inner">
            <ul class="actions primary">
                <li>
                    <div class="btn-group first">
                        <a class="btn play-button play-now" data-target="#songs-grid">
                            <svg height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 5v14l11-7z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg> <?php echo e(__('web.FEED_PLAY_ALL')); ?></span>
                        </a>
                        <a class="btn play-menu" data-target="#songs-grid" data-type="<?php echo e($type); ?>" data-id="<?php echo e($id); ?>">
                            <span class="caret"></span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="btn-group first">
                        <a class="btn add-button add-now" data-target="#songs-grid">
                            <svg height="26" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                            <span class="add-label" data-translate-text="SELECTION_ADD_ALL"><?php echo e(__('web.SELECTION_ADD_ALL')); ?></span>
                        </a>
                        <a class="btn add-menu" data-target="#songs-grid">
                            <span class="caret"></span>
                        </a>
                    </div>
                </li>
            </ul>
            <?php if(isset($trending)): ?>
                <ul class="actions secondary desktop">
                    <li>
                        <div class="btn-group no-border-left first">
                            <a class="btn today <?php if(Request::route()->getName() == 'frontend.trending'): ?> active <?php endif; ?>" href="<?php echo e(route('frontend.trending')); ?>">
                                <span data-translate-text="POPULAR_TODAY">Today</span>
                            </a>
                            <a class="btn week <?php if(Request::route()->getName() == 'frontend.trending.week'): ?> active <?php endif; ?>" href="<?php echo e(route('frontend.trending.week')); ?>">
                                <span data-translate-text="POPULAR_WEEK">Week</span>
                            </a>
                            <a class="btn month <?php if(Request::route()->getName() == 'frontend.trending.month'): ?> active <?php endif; ?>" href="<?php echo e(route('frontend.trending.month')); ?>"> <span data-translate-text="POPULAR_MONTH">Month</span> </a>
                        </div>
                    </li>
                    <li>
                        <form class="search-bar">
                            <svg class="icon search" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                            <input autocomplete="off" value="" name="q" class="filter" id="filter-search" type="text" placeholder="Filter">
                            <a class="icon ex clear-filter">
                                <svg height="16px" width="16px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m437.019531 74.980469c-48.351562-48.351563-112.640625-74.980469-181.019531-74.980469s-132.667969 26.628906-181.019531 74.980469c-48.351563 48.351562-74.980469 112.640625-74.980469 181.019531 0 68.382812 26.628906 132.667969 74.980469 181.019531 48.351562 48.351563 112.640625 74.980469 181.019531 74.980469s132.667969-26.628906 181.019531-74.980469c48.351563-48.351562 74.980469-112.636719 74.980469-181.019531 0-68.378906-26.628906-132.667969-74.980469-181.019531zm-70.292969 256.386719c9.761719 9.765624 9.761719 25.59375 0 35.355468-4.882812 4.882813-11.28125 7.324219-17.679687 7.324219s-12.796875-2.441406-17.679687-7.324219l-75.367188-75.367187-75.367188 75.371093c-4.882812 4.878907-11.28125 7.320313-17.679687 7.320313s-12.796875-2.441406-17.679687-7.320313c-9.761719-9.765624-9.761719-25.59375 0-35.355468l75.371093-75.371094-75.371093-75.367188c-9.761719-9.765624-9.761719-25.59375 0-35.355468 9.765624-9.765625 25.59375-9.765625 35.355468 0l75.371094 75.367187 75.367188-75.367187c9.765624-9.761719 25.59375-9.765625 35.355468 0 9.765625 9.761718 9.765625 25.589844 0 35.355468l-75.367187 75.367188zm0 0"/></svg>
                            </a>
                        </form>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="actions secondary desktop">
                    <li>
                        <a class="btn sort-button" <?php if(isset($search)): ?> data-sort-relevance="true" <?php endif; ?> data-sort-popularity="true" data-sort-song="true" data-sort-artist="true" data-sort-album="true" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="26" viewBox="0 0 24 24"><path d="M3 18h6v-2H3v2zM3 6v2h18V6H3zm0 7h12v-2H3v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                            <?php if(isset($search)): ?>
                            <span class="sort-label" data-translate-text="RELEVANCE"><?php echo e(__('web.RELEVANCE')); ?></span>
                            <?php else: ?>
                                <span class="sort-label" data-translate-text="POPULARITY"><?php echo e(__('web.POPULARITY')); ?></span>
                            <?php endif; ?>
                            <span class="caret"></span>
                        </a>
                    </li>
                    <?php if(isset($profile)): ?>
                        <li>
                            <div class="btn-group first">
                                <a href="<?php echo e(route('frontend.user.collection', ['username' => $profile->username])); ?>" class="btn all-music <?php if(Route::currentRouteName() == 'frontend.user.collection'): ?> active <?php endif; ?>">
                                    <span data-translate-text="ALL_MUSIC"><?php echo e(__('web.ALL_MUSIC')); ?></span>
                                </a>
                                <a href="<?php echo e(route('frontend.user.favorites', ['username' => $profile->username])); ?>" class="btn favorites <?php if(Route::currentRouteName() == 'frontend.user.favorites'): ?> active <?php endif; ?>">
                                    <span data-translate-text="FAVORITES"><?php echo e(__('web.FAVORITES')); ?></span>
                                </a>
                            </div>
                        </li>
                    <?php endif; ?>
                    <li>
                        <form class="search-bar">
                            <svg class="icon search" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
                            <input autocomplete="off" value="" name="q" class="filter" id="filter-search" type="text" placeholder="Filter">
                            <a class="icon ex clear-filter">
                                <svg height="16px" width="16px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m437.019531 74.980469c-48.351562-48.351563-112.640625-74.980469-181.019531-74.980469s-132.667969 26.628906-181.019531 74.980469c-48.351563 48.351562-74.980469 112.640625-74.980469 181.019531 0 68.382812 26.628906 132.667969 74.980469 181.019531 48.351562 48.351563 112.640625 74.980469 181.019531 74.980469s132.667969-26.628906 181.019531-74.980469c48.351563-48.351562 74.980469-112.636719 74.980469-181.019531 0-68.378906-26.628906-132.667969-74.980469-181.019531zm-70.292969 256.386719c9.761719 9.765624 9.761719 25.59375 0 35.355468-4.882812 4.882813-11.28125 7.324219-17.679687 7.324219s-12.796875-2.441406-17.679687-7.324219l-75.367188-75.367187-75.367188 75.371093c-4.882812 4.878907-11.28125 7.320313-17.679687 7.320313s-12.796875-2.441406-17.679687-7.320313c-9.761719-9.765624-9.761719-25.59375 0-35.355468l75.371093-75.371094-75.371093-75.367188c-9.761719-9.765624-9.761719-25.59375 0-35.355468 9.765624-9.765625 25.59375-9.765625 35.355468 0l75.371094 75.367187 75.367188-75.367187c9.765624-9.761719 25.59375-9.765625 35.355468 0 9.765625 9.761718 9.765625 25.589844 0 35.355468l-75.367187 75.367188zm0 0"/></svg>
                            </a>
                        </form>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div><?php /**PATH D:\ali-shiwani\laragon\www\live-streaming\resources\views\frontend\default/commons/toolbar/song.blade.php ENDPATH**/ ?>