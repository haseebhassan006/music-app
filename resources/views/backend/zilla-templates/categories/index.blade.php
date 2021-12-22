@extends('backend.index')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
		<li class="breadcrumb-item active">
            <span>Categories</span>

        </li>
    </ol>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    <a href="" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Create category</a>
</div>

<div class="row">
    <div class="col-md-2">
        @include('core::partials.settings-sidebar')
    </div>
    <div class="col-md-10">
        @if($data->count() > 0)
            <div class="card">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Group</th>
                                <th>Date Created</th>
                                <th>Date Modified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>

                                <td>

                                <a href="{{ route('settings.categories.edit', $item) }}">{{ $item->name }}</a>
                                </td>
                                <td>@if(isset($item->groupcategory->name)) {{$item->groupcategory->name}} @endif</td>
                               <td>
                                <div class="small text-muted">
                                        {{$item->created_at->format('M j, Y')}}
                                </div>
                                </td>
                                <td>
                                        <div class="small text-muted">
                                                {{$item->updated_at->format('M j, Y')}}
                                        </div>
                                </td>
                                
                                <td>
                                     <div class="d-flex">
                                        <div class="p-1 ">
                                             <a href="{{ route('settings.categories.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                                        </div>
                                        <div class="p-1 ">
                                                <form method="post" action="{{ route('settings.categories.destroy', $item) }}" onsubmit="return confirm('@lang('Confirm delete?')');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger btn-clean">
                                                        Delete
                                                    </button>
                                                </form>
                                        </div>
                                    </div>
                                   
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <div class="mt-4">
            {{ $data->appends( Request::all() )->links() }}
        </div>
        
        @if($data->count() == 0)
        <div class="alert alert-primary text-center">
            <i class="fe fe-alert-triangle mr-2"></i> No categories found
        </div>
        @endif
    </div>
    
</div>

@stop