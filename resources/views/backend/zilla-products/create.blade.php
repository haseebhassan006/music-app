@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{ route('backend.zilla-products') }}">Products</a></li>
        <li class="breadcrumb-item active">Create new product</li>
    </ol>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create product</h1>
</div>
<div class="row">
    <div class="col-md-8">

        <form role="form" action="{{ route('backend.zilla-products.create.product') }}" enctype="multipart/form-data" method="post">
        @csrf
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
                                        <option value="{{ $code }}"> {{ $title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3" value=""></textarea>
                            </div>
                            
                        </div>
                        
                    </div>

                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <a href="" class="btn btn-secondary">Cancel</a>
                        <button class="btn btn-primary ml-auto">Save</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    
</div>
@endsection