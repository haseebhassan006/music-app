@extends('index')
@section('content')
    @include('homepage.nav')
       
        <div class="container-fluid px-3">
        <div class="row d-flex  justify-content-lg-between">
            <!-- starting Offer Slider-->
            <div class="col-md-5 starting-head">
                @if(auth()->check())
                <h4>
                    <span>
                      <img width="28" height="28" style="border-radius: 15px;" src="{!! auth()->user()->artwork_url !!}">
                    </span> 
                    {{ __('web.WELCOME_BACK', ['name' => auth()->user()->name]) }}
                </h4>
                @endif
                <h2>What's Hot<br>This Weekend</h2>
                <p>ACCORDING TO WIKIPEDIA, A PARAGRAPH IS A SELF-CO NTAINED UNIT OF A DISCOURSE IN WRITING DEALING WITH A
                    PARTICULAR POINT OR IDEA. A PARAGRAPH CONSISTS OF ONE OR MORE SENTENCES.</p>

            </div>
            <!-- end Offer-->

            <!-- left corner Section-->
                        <div class="col-lg-3 col-md-3 col-sm-5 listing pt-4">
                <ul>
                    <li>0 Songs</li>
                    <li>0 Favorites</li>
                    <li>2 Playlists</li>
                    <li>1 Following</li>
                    <li>0 Followers</li>
                </ul>
            </div>
                        <!-- End -->
        </div>
    </div>

    <div id="page-content">
        @if(isset($home->recentListens) && count($home->recentListens))
             @include('commons.song-new', ['songs' => $home->recentListens, 'element' => 'carousel'])
        @endif
        {{-- @dd($home->popularSongs) --}}
        @if(isset($home->popularSongs) && count($home->popularSongs))
{{-- @include('commons.songs-trending', ['songs' => $home->popularSongs, 'element' => 'carousel'])--}}
        @endif 
        <div class="container-fluid" style="background-color:#000;">
            {{-- @include('commons.channel-new', ['channels' => $home->channels]) --}}
        </div>
    </div>
    {!! Advert::get('footer') !!}
    @include('homepage.footer')
@endsection