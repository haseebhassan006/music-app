@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Landing Pages</li>
    </ol>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">My Landing Pages</h1>
    <!--form method="get" action="{{ route('backend.zilla-landingpages') }}" class="my-3 my-lg-0 navbar-search">
        <div class="input-group">
        <input type="text" name="search" value="" class="form-control bg-light border-0 small" placeholder="Search landing pages" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
        </div>
    </form-->
    </div>
    <div class="row">
    <div class="col-sm-12 land_page">
        <div class="card">
        <div class="table-responsive min-h-200">
            <table class="table zilla_table">
            <thead class="thead-dark">
                <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Publish</th>
                <th>Domain</th>
                <th>Settings</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $item)
                <tr>
                <td>
                    <a href="{{ route('backend.zilla-landingpages.builder', $item->code) }}">{{ $item->name }}</a>
                </td>
                <td>
                    @if(isset($item->template->name))
                    {{$item->template->name}}
                    @else
                    None
                    @endif
                </td>
                <td>
                    @if($item->is_publish)
                    <span class="badge badge-success">Published</span>
                    @else
                    <span class="badge badge-danger">Not publish</span>
                    @endif    
                </td>
                <td>
                    @if($item->domain_type == 0)
                    <a href="http://{{$item->sub_domain}}" target="_blank">{{$item->sub_domain}}</a>
                    @elseif($item->domain_type == 1)
                    <a href="http://{{$item->custom_domain}}">{{$item->custom_domain}}</a>
                    @endif
                </td>

                <td>
                    <a href="{{route('backend.zilla-landingpages.setting', $item->code)}}" class="badge badge-primary"><i class="fas fa-cog"></i> Setting</a>
                </td>
                <td>
                    <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-top">
                        <a href="{{ route('backend.zilla-landingpages.builder', $item->code) }}" class="dropdown-item">Builder</a>
                        <form method="post" action="{{ route('backend.zilla-landingpages.clone', $item) }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                        Clone
                        </button>
                        </form>
                        <form method="post" action="{{ route('backend.zilla-landingpages.delete', $item->code) }}" onsubmit="return confirm('Confirm delete?');">
                        @csrf
                        <button class="dropdown-item">Delete</button>
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
    </div>
    
    
    </div>

@endsection