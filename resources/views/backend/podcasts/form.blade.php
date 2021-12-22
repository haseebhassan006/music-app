@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.podcasts') }}">Podcasts</a></li>
        <li class="breadcrumb-item active">{{ isset($podcast) ? $podcast->title : ' Add new podcast' }}</li>
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
            <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="title" value="{{ isset($podcast) && ! old('title') ? $podcast->title : old('title') }}" required>
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
                <div class="form-group multi-artists">
                    <label>Artists</label>
                    <select class="form-control multi-selector" data-ajax--url="{{ route('api.search.artist') }}" name="artist_id">
                        @if(isset($podcast) && isset($podcast->artist))
                            <option value="{{ $podcast->artist->id }}" selected="selected" data-artwork="{{ $podcast->artist->artwork_url }}" data-title="{{ $podcast->artist->name }}">{{ $podcast->artist->name }}</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select multiple="" class="form-control select2-active" name="category[]">
                        {!! podcastCategorySelection(explode(',', isset($podcast) && ! old('category') ? $podcast->category : old('category'))) !!}
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ isset($podcast) && ! old('description') ? $podcast->description : old('description') }}</textarea>
                </div>
                <div class="form-group filter-country">
                    <label>Country</label>
                    <div class="form-inline">
                        <div class="filter-country">
                            {!! makeCountryDropDown('country_code', 'form-control select2-active filter-country-select', isset($podcast) && ! old('country_code') ? $podcast->country_code : old('country_code')) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group filter-language @if(! isset($podcast) || ! $podcast->country_code) d-none @endif">
                    <label>Language</label>
                    <div class="form-inline filter-language-select">
                        @if(isset($podcast) && ($podcast->country_code || $podcast->language_id))
                            {!! makeCountryLanguageDropDown($podcast->country_code, 'language_id', 'form-control select2-active', isset($podcast) && ! old('language_id') ? $podcast->language_id : old('language_id')) !!}
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-info">Reset</button>
            </form>
        </div>
    </div>
</div>

<div id="textspeech" class="tab-pane fade">
            <div class="text_fieds">
            <form action="" class="speechform" id="speechfrm" enctype="multipart/form-data">
                    <textarea class="sppeech_text" name="textspeech" id="text_speech"></textarea>

            <div class="speech_button">
                <button type="button" onclick="enableMute()" class="btn microphone_btn" id="getValsilence">Silence</button>
                <button type="button" class="btn microphone_btn" id="getValvolume">Volume</button>
                <input type="range" class="vol_range "id="rngVolume" min="0" max="1" step=".01" value=".5"/>  
                <button type="button" class="btn microphone_btn" id="getValspeechrate">Speech Rate</button>
                <button type="button" class="btn microphone_btn" id="getValpitch">Pitch</button>
                <input class="pict_box" type="range" min="0" max="2" value="1" step="0.1" id="pitch" />
                <button type="button" class="btn microphone_btn" id="getValBtnID">Play</button>
                <!--input id="submit" type="button" value="Submit"-->
            </div>
            </form>

            <audio id="spechid"  autoplay></audio>
       </div>
</div>  

</div>
</div>
@endsection