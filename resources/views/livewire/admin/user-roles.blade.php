<div>
    <div class="row mb-3">
        <div class="col-6">
            <h2>Role</h2>
        </div>
        <div class="col-6 justify-content-end form-inline">
            <input type="text" class="form-control mr-1 " @cannot('create role') disabled @endcannot placeholder="Role name" wire:model.debounce.200ms="name">
            <button wire:click="createNewRole" class="btn btn-primary @cannot('create role') disabled @endcannot">Create new Role</button>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    @if($is_searcheable)
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="usr">Search:</label>
                    <input type="text" class="form-control" wire:model.debounce.200ms="search"
                           placeholder="Search by name or Email ...">
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
    @endif

    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <caption>Show all roles</caption>
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">guard_name</th>
                            <th scope="col">created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>{{ $role->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2 justify-content-center">
        {{ $roles->links('vendor.pagination.bootstrap-4') }}
    </div>

</div>
