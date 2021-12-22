@extends('backend.index')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
		<li class="breadcrumb-item active">
            <span>Products</span>

        </li>
    </ol>
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>
    <a href="{{ route('backend.zilla-products.create') }}" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create product</a>
</div>
    <div class="row">
    <div class="col-md-8">
        <div class="small text-muted mb-2">
            You can add products or services that you can sell directly from your landing pages using the integration with your PayPal or Stripe...                     
        </div>
    </div>
</div>
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Currency</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $index => $item)
                            <tr>
                                <td>
                                    <a href="">{{ $item->name }}</a>
                                </td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->currency }}</td>
                               <td style="width: 100px;">
                                    <div class="small text-muted">
                                        {{ $item->description }}
                                    </div>
                                </td>
                               <td>
                                <div class="small text-muted">
                                Date Created: {{ $item->created_at->format('M j, Y') }}
                                </div>
                                <div class="small text-muted">
                                Date Modified: {{ $item->updated_at->format('M j, Y') }}
                                </div>
                                </td>
                                
                                <td>
                                     <div class="d-flex">
                                        <div class="p-1 ">
                                             <a href="{{ route('backend.zilla-products.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                                        </div>
                                        <div class="p-1 ">
                                                <form method="post" action="{{ route('backend.zilla-products.delete', $item) }}"  onsubmit="return confirm('('Confirm delete?')');" >
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
</div>
</div>

    
@endsection