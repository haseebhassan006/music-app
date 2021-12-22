@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin/songs') }}">Songs</a></li>
        <li class="breadcrumb-item active"> {!! $song->title !!} - @foreach($song->artists as $artist)<a href="{{ route('backend.artists.edit', ['id' => $artist->id]) }}" title="{!! $artist->name !!}">{!! $artist->name !!}</a>@if(!$loop->last), @endif @endforeach</li>
    </ol>
	
    <div class="row">
        <div class="col-lg-12 media-info mb-3 album">
            <div class="media mb-3">
                <img class="mr-3" src="{{ $song->artwork_url }}">
                <div class="media-body">
                    <h5 class="m-0">{!! $song->title !!} - @foreach($song->artists as $artist)<a href="{{ url('admin/artists/edit/' . $artist->id) }}" title="{!! $artist->name !!}">{!! $artist->name !!}</a>@if(!$loop->last), @endif @endforeach</h5>
                    <h5>
                        @if($song->mp3)
                            <span class="badge badge-pill badge-dark">MP3</span>
                        @endif
                        @if($song->hd)
                            <span class="badge badge-pill badge-danger">HD</span>
                        @endif
                        @if($song->hls)
                            <span class="badge badge-pill badge-warning">HLS</span>
                        @endif
                    </h5>
                    <p class="m-0"><a href="{{ $song->permalink_url }}" class="btn btn-warning" target="_blank">Preview @if(! $song->approved) (only Moderator) @endif</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 media-info mb-3 song">
            <iframe width="100%" height="60" frameborder="0" src="{{ asset('share/embed/dark/song/' . $song->id) }}"></iframe>
        </div>
        

        <div class="col-lg-12">
            <form role="form" action="" enctype="multipart/form-data" method="post">

                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="pill"><i class="fas fa-fw fa-newspaper"></i> Overview</a></li>
                            <li class="nav-item"><a href="#streamable" class="nav-link" data-toggle="pill"><i class="fas fa-fw fa-lock"></i> Advanced</a></li>
                            <li class="nav-item"><a href="#textspeech" class="nav-link" data-toggle="pill">Text to speech</a></li>
                        </ul>
						
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-2" id="myTabContent">
                            <div id="overview" class="tab-pane fade show active">
                                @csrf
                                <div class="form-group">
                                    <label>Track Name</label>
                                    <input class="form-control" name="title" value="{!! $song->title !!}" required>
                                </div>
                                <div class="form-group multi-artists">
                                    <label>Artist(s)</label>
                                    <select class="form-control multi-selector" data-ajax--url="{{ route('api.search.artist') }}" name="artistIds[]" multiple="">
                                        @foreach ($song->artists as $index => $artist)
                                            <option value="{{ $artist->id }}" selected="selected" data-artwork="{{ $artist->artwork_url }}" data-title="{!! $artist->name !!}">{!! $artist->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group select2-artwork">
                                    <label>Album(s)</label>
                                    <select class="form-control select-ajax" data-ajax--url="/api/search/album" name="albumIds[]">
                                        @if($song->album)
                                            <option value="{{ $song->album->id }}" selected="selected" data-artwork="{{ $song->album->artwork_url }}"  data-title="{{ $song->album->title }}">{{ $song->album->title }}</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Edit artwork</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="artwork" class="file-selector" accept="image/*">
                                        <span class="input-group-addon"><i class="fas fa-fw fa-image"></i></span>
                                        <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                        <span class="input-group-btn">
                                            <button class="browse btn btn-primary input-lg" type="button"><i class="fas fa-fw fa-file"></i> Browse</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="4" class="form-control" name="description">{{ $song->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Genres</label>
                                    <select multiple="" class="form-control select2-active" name="genre[]">
                                        {!! genreSelection(explode(',', $song->genre)) !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Moods</label>
                                    <select multiple="" class="form-control select2-active" name="mood[]">
                                        {!! moodSelection(explode(',', $song->mood)) !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    {!! makeTagSelector('tags[]', isset($song) && ! old('tags') ? array_column($song->tags->toArray(), 'tag')  : old('tags')) !!}
                                </div>
                                <div class="form-group">
                                    <label>Released At</label>
                                    <input type="text" class="form-control datepicker" name="released_at" value="{{ \Carbon\Carbon::parse($song->released_at)->format('m/d/Y') }}" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Copyright</label>
                                    <input type="text" class="form-control" name="copyright" value="{{ $song->copyright }}">
                                </div>
                                @if(isset($song->bpm))
                                    <div class="form-group">
                                        <label>BPM</label>
                                        <input type="text" class="form-control" name="bpm" value="{{ $song->bpm }}">
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Youtube ID</label>
                                    <input type="text" class="form-control" name="youtube_id" value="{{ isset($song->log->youtube) ? $song->log->youtube : '' }}">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="switch">
                                            {!! makeCheckBox('selling', $song->selling ) !!}
                                            <span class="slider round"></span>
                                        </label>
                                        <label class="pl-6 col-form-label">Allow to sell this song</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ $song->price }}">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="switch">
                                            {!! makeCheckBox('allow_comments', $song->allow_comments ) !!}
                                            <span class="slider round"></span>
                                        </label>
                                        <label class="pl-6 col-form-label">Allow to comment</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="switch">
                                            {!! makeCheckBox('approved', $song->approved ) !!}
                                            <span class="slider round"></span>
                                        </label>
                                        <label class="pl-6 col-form-label">Approve this song</label>
                                    </div>
                                </div>
                            </div>
                            <div id="streamable" class="tab-pane fade">
                                <div class="alert alert-info">Note: You can configure additional song playable and downloadable parameters for different groups in this section.</div>
                                @if(cache()->has('usergroup'))
                                    @foreach(cache()->get('usergroup') as $group)
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">{{ $group->name }}</label>
                                            <div class="col-sm-9">
                                                {!! makeDropDown([
                                                        0 => 'Group Settings',
                                                        1 => 'Playable',
                                                        2 => 'Playable And Downloadable',
                                                        3 => 'Play And Download Denied'
                                                    ], 'group_extra[' . $group->id . ']', isset($options) && isset($options[$group->id]) ? $options[$group->id] : 0)
                                                !!}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div id="textspeech" class="tab-pane fade">
                                <div class="text_fieds">
                                    <form action="" method="post" id="ttsForm">
										<div class="form-group row">
											<div class="col-8">
												<textarea class="sppeech_text" name="textspeech" id="text_speech1"></textarea>
												<div class="speech_button">
													<!--<button type="button" onclick="enableMute()" class="btn microphone_btn" id="getValsilence">Silence</button>
													<button type="button" class="btn microphone_btn" id="getValvolume">Volume</button>
													<input type="range" class="vol_range "id="rngVolume" min="0" max="1" step=".01" value=".5"/>  
													<button type="button" class="btn microphone_btn" id="getValspeechrate">Speech Rate</button>
													<button type="button" class="btn microphone_btn" id="getValpitch">Pitch</button>
													<input class="pict_box" type="range" min="0" max="2" value="1" step="0.1" id="pitch" />-->
													<input type="hidden" id="textToSpeechType1" value="" />
													<input type="hidden" id="textToSpeechSpeaker1" value="" />
													<button type="button" class="btn microphone_btn" id="getValBtnID1" onclick="getTextToSpeech(1);">Play</button>
													<span id="speaker1" style="float: right; margin-right: 20px; margin-top: 5px; display:none;">Speaker: </span>
													<audio id="spechid1"  autoplay></audio>
													<!--input id="submit" type="button" value="Submit"-->
												</div>
												<div>
													<a href="javascript:void(0);" class="btn btn-info" onclick="addDialogue();" style="float:right;margin-top:10px;margin-bottom:10px;">Add more dialogue</a>
													<input type="hidden" id="totalttsdialogues" value="1" />
												</div>
												<div id="moreTtsDialogue">
												</div>
											</div>
											<div class="col-4">
												<div class="card-header p-0 position-relative">
													<ul class="nav">
														<li class="nav-item"><a class="nav-link active" href="#lovo" data-toggle="pill">Lovo</a></li>
														<li class="nav-item"><a href="#replica" class="nav-link" data-toggle="pill">Replica</a></li>
													</ul>
												</div>
												<?php
													
													/*$languages = array('American','Australian','British','Indian American','Indonesian','French','South African','Arabic','Brazilian','French Canadien','Chinese','Greek','Czech','Hindi','Danish','Dutch','Filipino','Finnish','Hungarian','German','Italian','Japanese','Korean','Norwegian','Polish','Portuguese','Russian','Slovak','Swedish','Spanish','Taiwanese','Turkish','Ukrainian','Vietnamese');*/
													$languages = array('American','Australian','British','Indonesian','French','Arabic','Brazilian','Chinese','Greek','Czech','Hindi','Danish','Dutch','Filipino','Finnish','Hungarian','German','Italian','Japanese','Korean','Norwegian','Polish','Portuguese','Russian','Slovak','Swedish','Spanish','Taiwanese','Turkish','Ukrainian','Vietnamese');
												?>
												<div class="">
													<div class="tab-content mt-2" id="myTabContent">
														<div id="lovo" class="tab-pane fade show active">
															<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion @if(isset($_COOKIE['sidebar']) &&  $_COOKIE['sidebar'] == 'small') toggled @endif " id="accordionSidebarVoiceSkins" style="width: 25rem !important;min-height: 0vh; border: solid 1px rgb(118, 118, 118);">
                                <?php
                                foreach($languages as $lng){ ?>
                                    <li class="nav-item zil_item" style="margin-bottom: 0rem;">
                                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#<?php echo str_replace(' ','-',$lng);?>" aria-expanded="false" aria-controls="<?php echo $lng;?>" style="width: 25rem;">
                                            <span><?php echo $lng;?></span>
                                        </a>
                                        <?php
                                            $curl = curl_init();
                                            $url = "https://api.lovo.ai/v1/skins?language=$lng";
                                            curl_setopt_array($curl, array(
                                                CURLOPT_URL => $url,CURLOPT_RETURNTRANSFER => true,CURLOPT_ENCODING => "",
                                                CURLOPT_MAXREDIRS => 10,
                                                CURLOPT_TIMEOUT => 0,
                                                CURLOPT_FOLLOWLOCATION => true,
                                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                CURLOPT_CUSTOMREQUEST => "GET",
                                                CURLOPT_HTTPHEADER => array(
                                                    "apikey: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjYwMjA5YzQzZTg1MGUxMDAxM2Y5NGIyNyIsImlhdCI6MTYzMzQyNTczNDEyNn0.ilSgA0GEiZT5sAiqoemOMDZZzCqU0c9JPTUzkjbTRq8",
                                                    "Content-Type: application/json"),
                                                ));
                                                
                                                $response = curl_exec($curl);
                                                curl_close($curl);
                                                $voiceSkinsList = "";
                                                //echo $response."<br><br>";
                                                $voiceSkinsList = json_decode($response, true);
                                                //print_r($voiceSkinsList['data']);
                                            if(isset($voiceSkinsList['data'])) {
                                                foreach($voiceSkinsList['data'] as $voiceList){ 
                                                    $voiceList_name = isset($voiceList['name']) ? $voiceList['name'] : "";
                                                ?>
                                                    <div id="<?php echo str_replace(' ','-',$lng);?>"       class="collapse" aria-labelledby="headingZila" data-parent="#accordionSidebarVoiceSkins" style="" onclick='getSeakerId("<?php echo $voiceList_name; ?>","lovo");'>
                                                        <div class=" bg-dark  py-2 collapse-inner rounded">
																							                                                        <a class="collapse-item" href="javascript:void(0);" style="padding: 0px;">
																								                                                        <i class="fas fa-user"></i>
                                                                                                                                                        <span style="margin-left: 10px;">
                                                                                                                                                            <label id="<?php echo $voiceList['name'];?>"><?php echo $voiceList['name'];?></label>
                                                                                                                                                            <br><br>
                                                                                                                                                            <span style="margin-left: 20px;">
                                                                                                                                                                <audio controls="" style="outline: none; height: 25px; width: 90%;"><source src="<?php echo str_replace('https','http',$voiceList['links']['audio']);?>" type="audio/wav">Your browser does not support the audio.</audio>
                                                                                                                                                            </span>
                                                                                                                                                        </span>
                                                                                            
                                                                                                                                                    </a>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        <?php } } ?>
                                            </li>
                                            <hr class="sidebar-divider">
                                        <?php } ?>
                                        </ul>
														</div>
														<div id="replica" class="tab-pane fade">
															<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion @if(isset($_COOKIE['sidebar']) &&  $_COOKIE['sidebar'] == 'small') toggled @endif " id="accordionSidebarVoiceSkins" style="width: 25rem !important;min-height: 0vh; border: solid 1px rgb(118, 118, 118);">
																<?php
																	$curl = curl_init();
																	$url = "https://api.replicastudios.com/auth";
																	curl_setopt_array($curl, array(
																	  CURLOPT_URL => $url,
																	  CURLOPT_RETURNTRANSFER => true,
																	  CURLOPT_ENCODING => "",
																	  CURLOPT_MAXREDIRS => 10,
																	  CURLOPT_TIMEOUT => 0,
																	  CURLOPT_FOLLOWLOCATION => true,
																	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
																	  CURLOPT_CUSTOMREQUEST => "POST",
																	  CURLOPT_POSTFIELDS => "client_id=rachel.aurelien@yahoo.com&secret=f6KUz8aZgH!UDtY"
																	));
																	
																	$response = curl_exec($curl);
																	curl_close($curl);
																	//echo $response;
																	$replicaAuth = json_decode($response, true);
																	//echo $replicaAuth['access_token'];
																	$curl = curl_init();
																	$url = "https://api.replicastudios.com/voice";
																	curl_setopt_array($curl, array(
																	  CURLOPT_URL => $url,
																	  CURLOPT_RETURNTRANSFER => true,
																	  CURLOPT_ENCODING => "",
																	  CURLOPT_MAXREDIRS => 10,
																	  CURLOPT_TIMEOUT => 0,
																	  CURLOPT_FOLLOWLOCATION => true,
																	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
																	  CURLOPT_CUSTOMREQUEST => "GET",
																	  CURLOPT_HTTPHEADER => array(
																		"authorization: Bearer ".$replicaAuth['access_token'],
																		"Content-Type: application/json"
																	  ),
																	));
																	
																	$voiceResponse = curl_exec($curl);
																	curl_close($curl);
																	
																	$replicaVoices = json_decode($voiceResponse, true);
																	/*print_r($replicaVoices);
																	exit;*/
																	foreach($replicaVoices as $replicaVoiceList){?>
																	<li class="nav-item zil_item" style="margin-bottom: 0rem;">
																		<div id="<?php echo $replicaVoiceList['name'];?>" class="" aria-labelledby="headingZila" data-parent="#accordionSidebarVoiceSkins" style="padding: 5px;" onclick='getSeakerId("<?php echo $replicaVoiceList['uuid'];?>","replica");'>
																			<div class=" bg-dark  py-2 collapse-inner rounded">
																				<a class="collapse-item" href="javascript:void(0);" style="padding: 0px; margin: 0 .5rem;">
																					<i class="fas fa-user"></i>
																					<span style="margin-left: 10px;" >
																						<label id="speakerName<?php echo $replicaVoiceList['uuid'];?>"><?php echo $replicaVoiceList['name'];?></label>
																						<br><br>
																						<?php
																							if(isset($replicaVoiceList['preview_url']) && $replicaVoiceList['preview_url'] != ''){?>
																								<span style="margin-left: 20px;">
																									<audio controls="" style="outline: none; height: 25px; width: 90%;"><source src="<?php echo $replicaVoiceList['preview_url'];?>" type="audio/wav">Your browser does not support the audio.</audio>
																								</span>
																							<?php
																							}
																						?>	
																					</span>
																					
																				</a>
																			</div>
																		</div>
																		</li>
																		<?php
																	}
																?>
															</ul>
														</div>
													</div>
												</div>
											</div>
										<div>
                                    </form>
                                </div>
                            </div>                            
                        </div>
                        <input type="hidden" name="file_id" value="{{ $song->file_id }}">
                        <button type="submit" class="btn btn-primary">Save</button>
                        @if(! $song->approved)
                            <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Reject</button>
                        @endif
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a class="btn btn-danger"  href="{{ route('backend.songs.delete', ['id' => $song->id]) }}" onclick="return confirm('Are you sure want to delete this song?')" data-toggle="tooltip" data-placement="left" title="Delete this song"><i class="fas fa-fw fa-trash"></i></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12">
            <div class="mt-5 collapse" id="collapseExample">
                <form role="form" method="post" action="{{ route('backend.songs.edit.reject.post', ['id' => $song->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea class="form-control" rows="3" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Reject & Send Email to the artist</button>
                </form>
            </div>

        </div>
    </div>
@endsection
<script type="text/javascript">
	function addDialogue(){
		var totalDialouge = $('#totalttsdialogues').val();
		totalDialouge++;
		var newDialogue = '<br><br><textarea class="sppeech_text" name="textspeech" id="text_speech'+totalDialouge+'"></textarea><div class="speech_button"><input type="hidden" id="textToSpeechType'+totalDialouge+'" value="" /><input type="hidden" id="textToSpeechSpeaker'+totalDialouge+'" value="" /><button type="button" class="btn microphone_btn" id="getValBtnID'+totalDialouge+'" onclick="getTextToSpeech('+totalDialouge+');">Play</button><span id="speaker'+totalDialouge+'" style="float: right; margin-right: 20px; margin-top: 5px; display:none;">Speaker: </span><audio id="spechid'+totalDialouge+'"  autoplay></audio></div>';
		$('#totalttsdialogues').val(totalDialouge);
		$('#moreTtsDialogue').append(newDialogue);
	}
</script>