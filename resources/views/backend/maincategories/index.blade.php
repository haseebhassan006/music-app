@extends('backend.index')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('backend.dashboard') }}">Control Panel</a>
        </li>
        <li class="breadcrumb-item active">Create and Manage News Category</li>
    </ol>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Main categories</h6>
            <h6 class="m-0 font-weight-bold float-right"><a class="text-primary" href="{{ route('backend.maincategories.add') }}">Add new main category</a></h6>

        </div>
        <div class="card-body">
        <table class="table card-table table-vcenter text-nowrap">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
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
                                <td>{{ $item->description }}</td>
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
                                             <a href="{{ route('backend.maincategories.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                                        </div>
                                        <div class="p-1 ">
                                            <a class="btn btn-sm btn-danger btn-clean" onclick="return confirm('Are you sure want to delete this category?');" href="{{ route('backend.maincategories.delete', ['id' => $item->id]) }}">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
    </table>
        </div>
    </div>
@endsection