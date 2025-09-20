@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Inventories Index') }}</span>
                        <a href="{{ route('inventories.create') }}" class="btn btn-success btn-sm">
                            Create
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventories as $key => $inventory)
                                    <tr>
                                        <td>{{ ($inventories->currentPage() - 1) * $inventories->perPage() + $key + 1 }}</td>
                                        <td>{{ $inventory->id }}</td>
                                        <td>{{ $inventory->name }}</td>
                                        <td>{{ $inventory->description }}</td>
                                        <td>{{ $inventory->qty }}</td>
                                        <td>
                                            <a href="{{ route('inventories.show', $inventory->id) }}"
                                                class="btn btn-info btn-sm">Show</a>
                                            <a href="{{ route('inventories.edit', $inventory->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a onclick="return confirm('Are you sure you want to delete {{ $inventory->name }}');"
                                                href="{{ route('inventories.destroy', $inventory->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-content mt-6">
                            {{ $inventories->links() }}
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 20px;">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Deleted Inventories Index') }}</span>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deletedInventories as $key => $inventory)
                                    <tr>
                                        <td>{{ ($deletedInventories->currentPage() - 1) * $deletedInventories->perPage() + $key + 1 }}
                                        </td>
                                        <td>{{ $inventory->id }}</td>
                                        <td>{{ $inventory->name }}</td>
                                        <td>{{ $inventory->description }}</td>
                                        <td>{{ $inventory->qty }}</td>
                                        <td>
                                            <form action="{{ route('inventories.restore', $inventory->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                            </form>
                                            <form action="{{ route('inventories.forceDelete', $inventory->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to permanently delete {{ $inventory->name }}?');">Force
                                                    Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-content mt-6">
                            {{ $deletedInventories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection