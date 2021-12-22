@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.podcasts') }}">Podcasts</a></li>
        <li class="breadcrumb-item active">{{ $podcast->title }}</li>
        <li class="breadcrumb-item active">{{ $episode->title }}</li>
    </ol>
    @if(isset($podcast))
        <div class="row col-lg-12 media-info mb-3 podcast">
            <div class="media">
                <img class="mr-3" src="{{ $podcast->artwork_url }}">
                <div class="media-body">
                    <h5 class="mt-0">{{ $podcast->title }}</h5>
                    <p>{{ $podcast->description }}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="card-header p-0 position-relative">
            <ul class="nav">
                            <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="pill"><i class="fas fa-fw fa-newspaper"></i>Form</a></li>
                            <li class="nav-item"><a href="#textspeech" class="nav-link" data-toggle="pill">Text to speech</a></li>
            </ul>
    </div>
    <div class="card-body">
      <div class="tab-content mt-2" id="myTabContent">

      <div id="overview" class="tab-pane fade show active">   
    <div class="row">
        <div class="col-lg-12">
            <div class="template-upload upload-info card">
                <form class="upload-edit-song-form m-0" method="POST" action="{{ route('backend.ajax.podcast.episode.edit')  }}" enctype="multipart/form-data">
                    @csrf
                    <div class="upload-info-content">
                        <div class="error hide">
                        </div>
                        <div class="upload-info-block">
                            <div class="song-info-container full">
                                <div class="control field">
                                    <label for="title">
                                        <span data-translate-text="FORM_TITLE">{{ __('web.FORM_EPISODE_TITLE') }}</span>
                                    </label>
                                    <input class="form-control" name="title" type="text" autocomplete="off" value="{{ $episode->title }}" required>
                                </div>
                                <div class="control field">
                                    <label for="copyright">
                                        <span data-translate-text="FORM_DESCRIPTION">{{ __('web.FORM_EPISODE_DESCRIPTION') }}</span>
                                    </label>
                                    <textarea class="form-control" name="description" cols="30" rows="5">{{ $episode->description }}</textarea>
                                </div>
                                <div class="control field">
                                    <label for="season">
                                        <span>Season</span>
                                    </label>
                                    <input class="form-control" name="season" type="text" placeholder="{{ __('web.EPISODE_SEASON_NUMBER_TIP') }}" autocomplete="off">
                                </div>
                                <div class="control field">
                                    <label for="number">
                                        <span data-translate-text="EPISODE_NUMBER_FORM">{{ __('web.EPISODE_NUMBER_FORM') }}</span>
                                    </label>
                                    <input class="form-control" name="number" type="text" placeholder="{{ __('web.EPISODE_NUMBER_TIP') }}" autocomplete="off">
                                </div>
                                <div class="control field">
                                    <label for="type">
                                        <span data-translate-text="FORM_TYPE">{{ __('web.FORM_TYPE') }}</span>
                                    </label>
                                    {!! makeDropDown(array(
                                        1 => __('web.EPISODE_TYPE_FULL'),
                                        2 => __('web.EPISODE_TYPE_TRAILER'),
                                        3 => __('web.EPISODE_TYPE_BONUS'),
                                    ), 'type', null, true) !!}
                                </div>
                                <div class="control field">
                                    <label for="created_at">
                                        <span data-translate-text="FORM_SCHEDULE_PUBLISH">{{ __('web.FORM_SCHEDULE_PUBLISH') }}</span>
                                    </label>
                                    <input class="form-control datepicker" name="created_at" type="text" placeholder="{{ __('web.IMMEDIATELY') }}" autocomplete="off">
                                </div>
                                <div class="control field row mb-0">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input name="visibility" type="checkbox" class="form-check-input" id="checkbox1{%=btoa(file.name).replace(/=/g, '')%}" checked>
                                            <label class="form-check-label" for="checkbox1{%=btoa(file.name).replace(/=/g, '')%}">{{ __('web.MAKE_PUBLIC') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input name="allow_comments" type="checkbox" class="form-check-input" id="checkbox2{%=btoa(file.name).replace(/=/g, '')%}" checked>
                                            <label class="form-check-label" for="checkbox2{%=btoa(file.name).replace(/=/g, '')%}">{{ __('web.ALLOW_COMMENTS') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="control field row mb-0">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input name="allow_download" type="checkbox" class="form-check-input" id="checkbox3{%=btoa(file.name).replace(/=/g, '')%}" checked>
                                            <label class="form-check-label" for="checkbox3{%=btoa(file.name).replace(/=/g, '')%}">{{ __('web.ALLOW_DOWNLOAD') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input name="explicit" type="checkbox" class="form-check-input" id="checkbox4{%=btoa(file.name).replace(/=/g, '')%}">
                                            <label class="form-check-label" for="checkbox4{%=btoa(file.name).replace(/=/g, '')%}">{{ __('web.PODCAST_EXPLICIT') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="upload-info-footer">
                            <input name="id" type="hidden" value="{{ $episode->id }}">
                            <button class="btn btn-primary save" type="submit" data-translate-text="SAVE">{{ __('SAVE') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="textspeech" class="tab-pane fade">
    <div class="text_fieds">
        <form action="" class="speechform" id="speechfrm" enctype="multipart/form-data">
			<div class="form-group row">
				<div class="col-8">
					<textarea class="sppeech_text" name="textspeech" id="text_speech1"></textarea>

					<div class="speech_button">
						<input type="hidden" id="textToSpeechType1" value="" />
						<input type="hidden" id="textToSpeechSpeaker1" value="" />
						<button type="button" class="btn microphone_btn" id="getValBtnID1" onclick="getTextToSpeech(1);">Play</button>
						<span id="speaker1" style="float: right; margin-right: 20px; margin-top: 5px; display:none;">Speaker: </span>
						<audio id="spechid1"  autoplay></audio>
						<!--<button type="button" onclick="enableMute()" class="btn microphone_btn" id="getValsilence">Silence</button>

						<button type="button" class="btn microphone_btn" id="getValvolume">Volume</button>
						<input type="range" class="vol_range "id="rngVolume" min="0" max="1" step=".01" value=".5"/>  

						<button type="button" class="btn microphone_btn" id="getValspeechrate">Speech Rate</button>
						<input class="Speech_box" type="range" min="22000" max="23000" id="Speechrate" />
						<div class="speechrte">
						<div id="rate-value" class="badge badge-primary" >5</div>
						<input class="custom-range" type="range" id="Speechrate" max="1"
								min="0.2" value="0.5" step="0.1">
						</div>
						<!--input type="range" list="tickmarks">
						<datalist id="tickmarks">
							<option value="0" label="0%"></option>
							<option value="25"></option>
							<option value="50" label="50%"></option>
							<option value="75"></option>
							<option value="100" label="100%"></option>
						</datalist>

						<button type="button" class="btn microphone_btn" id="getValpitch">Pitch</button>
						<input class="pict_box" type="range" min="0" max="2" step="0.1" id="pitch" />

						<button type="button" class="btn microphone_btn" id="getValBtnID">Play</button>
						<!--input id="submit" type="button" value="Submit">
						<audio id="spechid"  autoplay></audio>	-->
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
										foreach($languages as $lng){?>
											<li class="nav-item zil_item" style="margin-bottom: 0rem;">
												<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#<?php echo str_replace(' ','-',$lng);?>" aria-expanded="false" aria-controls="<?php echo $lng;?>" style="width: 25rem;">
													<span><?php echo $lng;?></span>
												</a>
												<?php
													$curl = curl_init();
													$url = "https://api.lovo.ai/v1/skins?language=$lng";
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
														"apikey: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjYwMjA5YzQzZTg1MGUxMDAxM2Y5NGIyNyIsImlhdCI6MTYzMzQyNTczNDEyNn0.ilSgA0GEiZT5sAiqoemOMDZZzCqU0c9JPTUzkjbTRq8",
														"Content-Type: application/json"
													  ),
													));
													
													$response = curl_exec($curl);
													curl_close($curl);
													$voiceSkinsList = "";
													//echo $response."<br><br>";
													$voiceSkinsList = json_decode($response, true);
													//print_r($voiceSkinsList['data']);
													foreach($voiceSkinsList['data'] as $voiceList){?>
														<div id="<?php echo str_replace(' ','-',$lng);?>" class="collapse" aria-labelledby="headingZila" data-parent="#accordionSidebarVoiceSkins" style="" onclick='getSeakerId("<?php echo $voiceList['name'];?>","lovo");'>
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
														<?php
													}
												?>
											</li>
											<hr class="sidebar-divider">
										<?php
										}
									?>
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
			</div>
        </form>

    </div>
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
