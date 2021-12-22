@extends('backend.index')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
		<li class="breadcrumb-item active">
            <span>Templates</span>

        </li>
    </ol>
  

    
@endsection