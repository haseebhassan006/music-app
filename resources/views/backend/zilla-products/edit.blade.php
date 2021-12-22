@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.zilla-products') }}">Products</a></li>
        <li class="breadcrumb-item active">Edit product</li>
    </ol>

<div class="row">
    <div class="col-md-8">

        <form role="form" method="post" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="" required class="form-control" placeholder="Name">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Gross Price</label>
                                <input type="number" required min="0" step="0.01" name="price" value="" class="form-control" placeholder="Price">
                            </div>
                            
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="form-label">Currency</label>
                                <select name="currency" class="form-control">
                                    @foreach($currencies as $code => $title)
                                        <option value="{{ $code }}" {{ $item->currency === $code ? 'selected' : '' }}> {{ $title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3">{{ $item->description }}</textarea>
                            </div>
                            
                        </div>
                        
                    </div>

                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <a href="{{ route('backend.zilla-products') }}" class="btn btn-secondary">Cancel</a>
                        <button class="btn btn-primary ml-auto">Save</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    
</div>
@endsection