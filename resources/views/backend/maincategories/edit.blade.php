@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.maincategories') }}">Main categories</a></li>
        <li class="breadcrumb-item active">{{ isset($data) ? $data->name : 'edit main category' }}</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="post" action="{{ route('backend.maincategories.edit.post') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row border-bottom mb-0 pt-3 pb-3">
                    <label class="col-sm-3">Name
                        <p class="small">The name is how it appears on your site.</p></label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="name" value="{{ isset($data) ? $data->name : old('name') }}" required>
                    </div>
                </div>
                <div class="form-group row border-bottom mb-0 pt-3 pb-3">
                    <label class="col-sm-3">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="2" name="description" placeholder="Option">{{ isset($data) ? $data->description : old('description') }}</textarea>
                    </div>
                </div>
                 <button class="btn btn-primary ml-auto">save</button>
                <button type="reset" class="btn btn-info">Reset</button>
            </form>
        </div>
    </div>
@endsection