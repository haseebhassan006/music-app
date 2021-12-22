@if(isset($channels) && count($channels))
    @php
        $count = 0;
    @endphp
    @foreach ($channels as $channel)
        @if($channel->objects != null)

        
            <div class="row trd-lin">
                <div class="col-lg-12 px-1 py-0 titl">
                    <h2>{{ $channel->title }}</h2>
                    <div class="play-slider swiper">
                        <div class="swiper-wrapper">
                            @foreach ($channel->objects->data as $index => $album)
                            {{-- @dd($album->name) --}}
                            <script>var album_data_{{ $album->id }} = {!! json_encode($album) !!}</script>
                            <div class="swiper-slide slidinz" data-toggle="contextmenu" data-trigger="right" data-type="album" data-id="{{ $album->id }}">
                                <div class="testimonial-item">
                                    <img src="{{ $album->artwork_url }}" class="img-fluid" alt="">
                                    <div class="additional">
                                        <ul>
                                            <li><i class="fa fa-play" aria-hidden="true"></i></li>
                                            {{-- <li>06:85</li> --}}
                                        </ul>
                                    </div>
                                    <a class="overlay-link" href="{{$album->permalink_url}}"><h6> {{ (isset($album->name)) ? str_limit($album->name, 8) : '' }}</h6></a>
                                    {{-- <p>30 Snips</p> --}}
        
                                </div>
                            </div><!-- End song item -->
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        
        

        @endif
        @php
            $count++;
        @endphp
        @if ($count == 2)
            @break
        @endif
    @endforeach
@endif

