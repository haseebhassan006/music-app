@extends('index_new')
@section('content')
    @include('homepage.nav')

    <!-- @if (auth()->check()) -->
        <div class="banner-right" style="position: absolute; right: 0;">
            <ul class="list_default">
                <li>{{ auth()->user()->collection_count }} {{ __('web.SONGS') }}</li>
                <li>{{ auth()->user()->favorite_count }} {{ __('web.FAVORITES') }}</li>
                <li>{{ auth()->user()->playlist_count }} {{ __('web.PLAYLISTS') }}</li>
                <li>{{ auth()->user()->following_count }} {{ __('web.FOLLOWING') }}</li>
                <li>{{ auth()->user()->follower_count }} {{ __('web.FOLLOWERS') }}</li>
            </ul>
        </div>
    <!-- @endif -->
    <div class="home-new-banner-cnt">
        <div class="home-new-banner-sub-cnt-part">
            @if (auth()->check())
                <div class="home-new-banner-admin">
                    <img src="{!! auth()->user()->artwork_url !!}">
                    <h6>{{ __('web.WELCOME_BACK', ['name' => auth()->user()->name]) }}</h6>
                </div>
            @endif
            <h2>What's Hot<br>This Weekend</h2>
                <p>ACCORDING TO WIKIPEDIA, A PARAGRAPH IS A SELF-CO NTAINED UNIT OF A DISCOURSE IN WRITING DEALING WITH A
                    PARTICULAR POINT OR IDEA. A PARAGRAPH CONSISTS OF ONE OR MORE SENTENCES.</p>
        </div>
    </div>
    
    <div id="page-content" class="home">
        <div id="column1" class="full">
           
            @if (auth()->check())
                @if(isset($home->recentListens) && count($home->recentListens))
                    @include('commons.suggest', ['more_link' => auth()->user()->permalink_url, 'type' => 'recent', 'songs' => $home->recentListens, 'title' => '<span data-translate-text="LISTEN_AGAIN">' . __('web.LISTEN_AGAIN') . '</span>', 'description' => '<span class="section-tagline" data-translate-text="TAGLINE_LISTEN_AGAIN">' . __('web.TAGLINE_LISTEN_AGAIN') . '</span>'])
                @endif
                @if(isset($home->userCommunitySongs) && count($home->userCommunitySongs))
                    @include('commons.suggest', ['more_link' => route('frontend.community'), 'type' => 'community', 'songs' => $home->userCommunitySongs, 'title' => '<span data-translate-text="TOP_COMMUNITY_ALBUMS">' . __('web.TOP_COMMUNITY_ALBUMS') . '</span>', 'description' => '<span class="section-tagline" data-translate-text="TAGLINE_COMMUNITY">' . __('web.TAGLINE_COMMUNITY') . '</span>'])
                @endif
                @if(isset($home->obsessedSongs) && count($home->obsessedSongs))
                    @include('commons.suggest', ['more_link' => auth()->user()->permalink_url, 'type' => 'obsessed', 'songs' => $home->obsessedSongs, 'title' => '<span data-translate-text="YOU_ARE_OBSESSED_WITH_MUSIC">' . __('web.YOU_ARE_OBSESSED_WITH_MUSIC') . '</span>', 'description' => '<span class="section-tagline" data-translate-text="TAGLINE_SIMILAR_OBSESSED">' . __('web.TAGLINE_SIMILAR_OBSESSED') . '</span>'])
                @endif
            @endif
            @include('commons.channel', ['channels' => $home->channels])
            @if(isset($home->popularSongs) && count($home->popularSongs))
                @include('commons.suggest', ['more_link' => route('frontend.trending'), 'type' => 'popular', 'songs' => $home->popularSongs, 'title' => '<span data-translate-text="POPULAR">' . __('web.POPULAR') . '</span>', 'description' => '<span class="section-tagline" data-translate-text="TAGLINE_POPULAR">' . __('web.TAGLINE_POPULAR') . '</span>'])
            @endif
        </div>
    </div>
    {!! Advert::get('footer') !!}
    @include('homepage.footer')
@endsection