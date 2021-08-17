<div>
    <div class="row mb-3">
        <div class="col-6">
            <h2>Users</h2>
        </div>
        <div class="col-6 text-right">
            <a href="" class="btn btn-primary @cannot('create user') disabled @endcannot">Create new user</a>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="usr">Search:</label>
                <input type="text" class="form-control" wire:model.debounce.300ms="search" placeholder="Search by name or Email ...">
                @error('search') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="usr">Order:</label>
                        <select class="form-control" wire:model="orderByInput">
                            <option value="name">Name</option>
                            <option value="email">Email</option>
                            <option value="created_at">Created at</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="usr">Order By:</label>
                        <select class="form-control" wire:model="orderBy">
                            <option value="asc">Asc</option>
                            <option value="desc">Desc</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
{{--                        <caption>Show all users</caption>--}}
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('admin.users.show', $user->id) }}">{{ ucfirst($user->name) }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRoleNames()[0] }}</td>
                                <td>{{ $user->created_at->format($date_format) }}</td>
                                <td class="text-right">
                                    <a href="" class="btn btn-sm btn-success">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2 justify-content-center">
        {{ $users->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
