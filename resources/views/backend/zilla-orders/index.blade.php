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
            <span>Products</span>
        </li>
    </ol>
	<div class="container-fluid">
            
		<div class="d-sm-flex align-items-center justify-content-between mb-2">
			<div>
				<h1 class="h3 mb-0 text-gray-800">Orders</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="small text-muted mb-2">
					Orders will be able to conveniently display and give status to orders processed through the payment Plaform (PayPal, Stripe...) payment system...                       
				</div>
			</div>
		</div>
		
     </div>
    
@endsection