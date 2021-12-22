
<div class="container-fluid">
    <div class="row trndg">
    @if (count($songs)>=6)
        <div class="col-lg-4 trd">
            <h2>TRENDING</h2>
            <div class="trd-bg">
                <table>
                    @php
                        $count = 0;
                        $count_new = 0;
                    @endphp
                    @foreach ($songs as $index => $song)
                        @if(isset($song->title) && $count < 6 )
                        <script>var song_data_{{ $song->id }} = {!! json_encode($song) !!}</script>
                        <tr>
                            <td><img width="35" height="35" src="{{$song->artwork_url}}"></td>
                            <td>0{{ $index +1 }} 
                                <a class="btn play play-lg play-object" data-type="song" data-id="{{$song->id}}">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>{!! $song->title !!}</td>
                            @foreach($song->artists as $artist)
                            <td>{!! $artist->name !!}</td>
                            @endforeach
                            <td>{{humanTime($song->duration)}}</td>
                        </tr>
                        @else
                            @break
                        @endif
                        @php($count++)
                    @endforeach
                </table>
            </div>
        </div>

        <div class="col-lg-4 mx-3 trd">
            <h2>TRENDING</h2>
            <div class="trd-bg">
                <table>
                    @foreach ($songs as $index => $song)
                        @if(isset($song->title) && $count_new >= $count )
                        <script>var song_data_{{ $song->id }} = {!! json_encode($song) !!}</script>
                        <tr>
                            <td><img width="35" height="35" src="{{$song->artwork_url}}"></td>
                            <td>0{{ $index +1 }} 
                                <a class="btn play play-lg play-object" data-type="song" data-id="{{$song->id}}">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>{!! $song->title !!}</td>
                            @foreach($song->artists as $artist)
                            <td>{!! $artist->name !!}</td>
                            @endforeach
                            <td>{{humanTime($song->duration)}}</td>
                        </tr>
                        @endif
                    @php($count_new++)
                    @endforeach
                </table>
            </div>
        </div>
    @else
        <div class="col-lg-4 trd">
            <h2>TRENDING</h2>
            <div class="trd-bg">
                <table>
                    @foreach ($songs as $index => $song)
                        @if(isset($song->title))
                        <script>var song_data_{{ $song->id }} = {!! json_encode($song) !!}</script>
                        <tr>
                            <td><img width="35" height="35" src="{{$song->artwork_url}}"></td>
                            <td>0{{ $index +1 }} 
                                <a class="btn play play-lg play-object" data-type="song" data-id="{{$song->id}}">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>{!! str_limit($song->title, 18) !!}</td>
                            @foreach($song->artists as $artist)
                            <td>{!! str_limit($artist->name, 8) !!}</td>
                            @endforeach
                            <td>{{humanTime($song->duration)}}</td>
                        </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    @endif
    </div>
</div>