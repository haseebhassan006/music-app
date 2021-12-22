 <!-- <div id="home-dashboard"> -->
            <!-- <div id="home-dashboard-user"> -->
                <!-- <a href="{{ auth()->user()->permalink_url }}" class="user-img-container">
                    <img src="{!! auth()->user()->artwork_url !!}" class="user-img">
                </a>
                <div class="welcome-message" data-translate-text="WELCOME_BACK" data-name="{{ auth()->user()->name }}">{{ __('web.WELCOME_BACK', ['name' => auth()->user()->name]) }}</div>
            
                <div class="dashboard-links">
                    <a href="{{ route('frontend.user.favorites', ['username' => auth()->user()->username]) }}" class="dashboard-link" data-translate-text="MY_MUSIC">{{ __('web.MY_MUSIC') }}</a> • <a href="/{{ auth()->user()->username }}" class="dashboard-link" data-translate-text="VIEW_PROFILE">{{ __('web.VIEW_PROFILE') }}</a>
                </div> -->
                <!-- <div class="col-md-5 starting-head">
                @if (auth()->check())
                    <h4><span><img width="28" height="28" style="border-radius: 15px;" src="{!! auth()->user()->artwork_url !!}"></span> {{ __('web.WELCOME_BACK', ['name' => auth()->user()->name]) }}</h4>
                @endif
                    <h2>What's Hot<br>This Weekend</h2>
                    <p>ACCORDING TO WIKIPEDIA, A PARAGRAPH IS A SELF-CO NTAINED UNIT OF A DISCOURSE IN WRITING DEALING WITH A
                    PARTICULAR POINT OR IDEA. A PARAGRAPH CONSISTS OF ONE OR MORE SENTENCES.</p>
                  
                <ul>
                    <li> <a href="{{ route('frontend.user.collection', ['username' => auth()->user()->username]) }}" class="stat"> <span id="user-collection" class="num">{{ auth()->user()->collection_count }}</span> <span class="label" data-translate-text="SONGS">{{ __('web.SONGS') }}</span> </a> </li>
                    <li> <a href="{{ route('frontend.user.favorites', ['username' => auth()->user()->username]) }}" class="stat"> <span id="user-favorites" class="num">{{ auth()->user()->favorite_count }}</span> <span class="label" data-translate-text="FAVORITES">{{ __('web.FAVORITES') }}</span> </a> </li>
                    <li> <a href="{{ route('frontend.user.playlists', ['username' => auth()->user()->username]) }}" class="stat"> <span id="user-playlists" class="num">{{ auth()->user()->playlist_count }}</span> <span class="label" data-translate-text="PLAYLISTS">{{ __('web.PLAYLISTS') }}</span> </a> </li>
                    <li> <a href="{{ route('frontend.user.following', ['username' => auth()->user()->username]) }}" class="stat"> <span id="user-following" class="num">{{ auth()->user()->following_count }}</span> <span class="label" data-translate-text="FOLLOWING">{{ __('web.FOLLOWING') }}</span> </a> </li>
                    <li> <a href="{{ route('frontend.user.followers', ['username' => auth()->user()->username]) }}" class="stat last"> <span id="user-followers" class="num">{{ auth()->user()->follower_count }}</span> <span class="label" data-translate-text="FOLLOWERS">{{ __('web.FOLLOWERS') }}</span> </a> </li>
                </ul>
           
                </div> -->
            <!-- </div> -->
           
            <!-- <ul  class="stat-summary">
                <li> <a href="{{ route('frontend.user.collection', ['username' => auth()->user()->username]) }}" class="stat"> <span id="user-collection" class="num">{{ auth()->user()->collection_count }}</span> <span class="label" data-translate-text="SONGS">{{ __('web.SONGS') }}</span> </a> </li>
                <li> <a href="{{ route('frontend.user.favorites', ['username' => auth()->user()->username]) }}" class="stat"> <span id="user-favorites" class="num">{{ auth()->user()->favorite_count }}</span> <span class="label" data-translate-text="FAVORITES">{{ __('web.FAVORITES') }}</span> </a> </li>
                <li> <a href="{{ route('frontend.user.playlists', ['username' => auth()->user()->username]) }}" class="stat"> <span id="user-playlists" class="num">{{ auth()->user()->playlist_count }}</span> <span class="label" data-translate-text="PLAYLISTS">{{ __('web.PLAYLISTS') }}</span> </a> </li>
                <li> <a href="{{ route('frontend.user.following', ['username' => auth()->user()->username]) }}" class="stat"> <span id="user-following" class="num">{{ auth()->user()->following_count }}</span> <span class="label" data-translate-text="FOLLOWING">{{ __('web.FOLLOWING') }}</span> </a> </li>
                <li> <a href="{{ route('frontend.user.followers', ['username' => auth()->user()->username]) }}" class="stat last"> <span id="user-followers" class="num">{{ auth()->user()->follower_count }}</span> <span class="label" data-translate-text="FOLLOWERS">{{ __('web.FOLLOWERS') }}</span> </a> </li>
            </ul> -->
         
        <!-- </div> -->