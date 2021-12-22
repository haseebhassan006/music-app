@extends('index_latest')
@section('content')
    <div class="container-fluid px-3">
        <div class="row d-flex  justify-content-lg-between">
            <!-- starting Offer Slider-->
            <div class="col-md-5 starting-head">
                @if (auth()->check())
                    <h4><span><img width="28" height="28" style="border-radius: 15px;" src="{!! auth()->user()->artwork_url !!}"></span> {{ __('web.WELCOME_BACK', ['name' => auth()->user()->name]) }}</h4>
                @endif
                <h2>What's Hot<br>This Weekend</h2>
                <p>ACCORDING TO WIKIPEDIA, A PARAGRAPH IS A SELF-CO NTAINED UNIT OF A DISCOURSE IN WRITING DEALING WITH A
                    PARTICULAR POINT OR IDEA. A PARAGRAPH CONSISTS OF ONE OR MORE SENTENCES.</p>
            </div>
            <!-- end Offer-->

            <!-- left corner Section-->
            @if (auth()->check())
            <div class="col-lg-3 col-md-3 col-sm-5 listing pt-4">
                <ul>
                    <li>{{ auth()->user()->collection_count }} {{ __('web.SONGS') }}</li>
                    <li>{{ auth()->user()->favorite_count }} {{ __('web.FAVORITES') }}</li>
                    <li>{{ auth()->user()->playlist_count }} {{ __('web.PLAYLISTS') }}</li>
                    <li>{{ auth()->user()->following_count }} {{ __('web.FOLLOWING') }}</li>
                    <li>{{ auth()->user()->follower_count }} {{ __('web.FOLLOWERS') }}</li>
                </ul>
            </div>
            @endif
            <!-- End -->
        </div>
    </div>
    <div id="page-content">
        
        {{-- @if(isset($home->popularSongs) && count($home->popularSongs))
            @include('commons.suggest', ['more_link' => route('frontend.trending'), 'type' => 'popular', 'songs' => $home->popularSongs, 'title' => '<span data-translate-text="POPULAR">' . __('web.POPULAR') . '</span>', 'description' => '<span class="section-tagline" data-translate-text="TAGLINE_POPULAR">' . __('web.TAGLINE_POPULAR') . '</span>'])
        @endif   --}}
        {{-- <div class="container-fluid">
            <!-- slider song -->
            <div class="sldr">
                <div class="row trd-lin btm-line px-1">
                    <div class="col-lg-12 p-0">
                        <div class="song-slider swiper">
                            <div class="swiper-wrapper">
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
                                </div><!-- End song item -->
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
                                </div><!-- End song item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        @if(isset($home->recentListens) && count($home->recentListens))
        
            @include('commons.song-new', ['songs' => $home->recentListens, 'element' => 'carousel'])

        @endif
        {{-- @dd($home->popularSongs) --}}
        @if(isset($home->popularSongs) && count($home->popularSongs))
            @include('commons.songs-trending', ['songs' => $home->popularSongs, 'element' => 'carousel'])
        @endif
        {{-- <div class="container-fluid">
            <div class="row trndg">
                <div class="col-lg-4 trd">
                    <h2>TRENDING</h2>
                    <div class="trd-bg">
                        <table>
                            <tr>
                                <td><img src="assets/img/ssong1.png"></td>
                                <td>01 <i class="fa fa-play" aria-hidden="true"></i></td>
                                <td>What works for me</td>
                                <td>Harmony</td>
                                <td>5.86</td>
                            </tr>

                            <tr>
                                <td><img src="assets/img/ssong2.png"></td>
                                <td>01 <i class="fa fa-play" aria-hidden="true"></i></td>
                                <td>Affirmations for peace and harmoney</td>
                                <td>Harmony</td>
                                <td>5.86</td>
                            </tr>

                            <tr>
                                <td><img src="assets/img/ssong3.png"></td>
                                <td>01 <i class="fa fa-play" aria-hidden="true"></i></td>
                                <td>What works for me</td>
                                <td>Harmony</td>
                                <td>5.86</td>
                            </tr>

                            <tr>
                                <td><img src="assets/img/ssong4.png"></td>
                                <td>01 <i class="fa fa-play" aria-hidden="true"></i></td>
                                <td>What works for me</td>
                                <td>Harmony</td>
                                <td>5.86</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4 mx-3 trd">
                    <h2>TRENDING</h2>
                    <div class="trd-bg">
                        <table>
                            <tr>
                                <td><img src="assets/img/ssong1.png"></td>
                                <td>01 <i class="fa fa-play" aria-hidden="true"></i></td>
                                <td>What works for me</td>
                                <td>Harmony</td>
                                <td>5.86</td>
                            </tr>

                            <tr>
                                <td><img src="assets/img/ssong2.png"></td>
                                <td>01 <i class="fa fa-play" aria-hidden="true"></i></td>
                                <td>Affirmations for peace and harmoney</td>
                                <td>Harmony</td>
                                <td>5.86</td>
                            </tr>

                            <tr>
                                <td><img src="assets/img/ssong3.png"></td>
                                <td>01 <i class="fa fa-play" aria-hidden="true"></i></td>
                                <td>What works for me</td>
                                <td>Harmony</td>
                                <td>5.86</td>
                            </tr>

                            <tr>
                                <td><img src="assets/img/ssong4.png"></td>
                                <td>01 <i class="fa fa-play" aria-hidden="true"></i></td>
                                <td>What works for me</td>
                                <td>Harmony</td>
                                <td>5.86</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="container-fluid">
            <div class="row trd-lin">
                <div class="col-lg-12 px-1 py-0 titl">
                    <h2>EDITORS PICKS</h2>
                    <div class="play-slider swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide slidinz">
                                <div class="testimonial-item">
                                    <img src="assets/img/1.png" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            <li>06:85</li>
                                        </ul>
                                    </div>
                                    <h6> what works for me</h6>
                                    <p>30 Snips</p>

                                </div>
                            </div><!-- End song item -->
                            <div class="swiper-slide slidinz">
                                <div class="testimonial-item">
                                    <img src="assets/img/2.png" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            <li>06:85</li>
                                        </ul>
                                    </div>
                                    <p> what works for me<br>
                                        <span>30 Snips</span>
                                    </p>
                                </div>
                            </div><!-- End song item -->
                            <div class="swiper-slide slidinz">
                                <div class="testimonial-item">
                                    <img src="assets/img/3.png" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            <li>06:85</li>
                                        </ul>
                                    </div>
                                    <p> what works for me <br>
                                        <span>30 Snips</span>
                                    </p>
                                </div>
                            </div><!-- End song item -->
                            <div class="swiper-slide slidinz">
                                <div class="testimonial-item">
                                    <img src="assets/img/4.png" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            <li>06:85</li>
                                        </ul>
                                    </div>
                                    <p> what works for me <br>
                                        <span>30 Snips</span>
                                    </p>
                                </div>
                            </div><!-- End song item -->
                            <div class="swiper-slide slidinz">
                                <div class="testimonial-item">
                                    <img src="assets/img/5.png" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            <li>06:85</li>
                                        </ul>
                                    </div>
                                    <p> what works for me<br>
                                        <span>30 Snips</span>
                                    </p>
                                </div>
                            </div><!-- End song item -->
                            <div class="swiper-slide slidinz">
                                <div class="testimonial-item">
                                    <img src="assets/img/6.png" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            <li>06:85</li>
                                        </ul>
                                    </div>
                                    <p> what works for me <br>
                                        <span>30 Snips</span>
                                    </p>
                                </div>
                            </div><!-- End song item -->
                            <div class="swiper-slide slidinz">
                                <div class="testimonial-item">
                                    <img src="assets/img/7.png" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            <li>06:85</li>
                                        </ul>
                                    </div>
                                    <p> what works for me <br>
                                        <span>30 Snips</span>
                                    </p>
                                </div>
                            </div><!-- End song item -->
                            <div class="swiper-slide slidinz">
                                <div class="testimonial-item">
                                    <img src="assets/img/8.png" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            <li>06:85</li>
                                        </ul>
                                    </div>
                                    <p> what works for me<br>
                                        <span>30 Snips</span>
                                    </p>
                                </div>
                            </div><!-- End song item -->
                            <div class="swiper-slide slidinz">
                                <div class="testimonial-item">
                                    <img src="assets/img/9.png" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            <li>06:85</li>
                                        </ul>
                                    </div>
                                    <p> what works for me<br>
                                        <span>30 Snips</span>
                                    </p>
                                </div>
                            </div><!-- End song item -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="sldr-btm">
                <div class="row trd-lin  px-1">
                    <div class="col-lg-12 p-0">
                        <div class="btm-song-slider swiper">
                            <div class="swiper-wrapper">
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
                                </div><!-- End song item -->
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
                                </div><!-- End song item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}
        <div class="container-fluid" style="background-color:#000;">
            @include('commons.channel-new', ['channels' => $home->channels])
        </div>

    </div>
@endsection
