{{-- @if($element == "activity") --}}
 
<div class="container-fluid">
            <!-- slider song -->   
            <div class="sldr">       
              <div class="row trd-lin btm-line px-1"> 
                <div class="col-lg-12 p-0">
                  <div class="song-slider swiper">
                    <div class="swiper-wrapper">
                    @foreach ($songs as $index => $song)
                        @if(isset($song->title))
                        <script>var song_data_{{ $song->id }} = {!! json_encode($song) !!}</script>
                    <div class="swiper-slide slidinz">
                      <a href="">
                       <table>
                        <tr>
                        <td><img src="{{$song->artwork_url}}" width="40"></td> 
                          <td><i class="fas fa-play" aria-hidden="true"></i></td>                          
                          <td>
                          <h6>{!! str_limit($song->title, 10) !!}</h6>                            <p>Harmony</p>
                        
                          @foreach($song->artists as $artist)
                          <p>{!! str_limit($artist->name, 8) !!}</p>
                           @endforeach
                          </td>
                          <td class="tim">{{humanTime($song->duration)}}</td>
                        </tr>
                       </table>
                      </a>
                    </div><!-- End song item -->
                    @endif
                    @endforeach
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
{{-- @endif --}}
