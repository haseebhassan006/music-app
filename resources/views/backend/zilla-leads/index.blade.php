@extends('backend.index')
@section('content')
	<ul class="navbar-nav mb-4">
		<li class="nav-item">
		  <a class="nav-link" href="{{ route('backend.zilla-templates') }}">
			<i class="fas fa-plus fa-lg"></i>
			<span class="d-none d-sm-inline-block ml-2">New Landing Page</span>
		  </a>
		</li>
		
	</ul>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
		<li class="breadcrumb-item">
            <span>Leads</span>
        </li>
    </ol>
    
@endsection