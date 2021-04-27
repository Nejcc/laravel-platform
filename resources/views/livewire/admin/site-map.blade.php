<div>
    <div class="row mb-3">
        <div class="col-6">
            <h2>Routes Sitemap</h2>
        </div>
        <div class="col-6 text-right">
            <a href="" class="btn btn-primary" wire:click="forcereset">Reset routes</a>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="usr">Search:</label>
                <input type="text" class="form-control" wire:model.debounce.300ms="search" placeholder="Search...">
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
                        <thead>
                        <tr>
                            <th scope="col">Route</th>
                            <th scope="col">name</th>
                            <th scope="col">prefix</th>
                            <th scope="col">action_method</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($routes as $route)
                            <tr>
                                <td><a href="{{ url($route->uri) }}" target="_blank">{{ $route->uri ?? '' }}</a></td>
                                <td>{{ $route->name ?? '' }}</td>
                                <td>{{ $route->prefix ?? '' }}</td>
                                <td>{{ $route->action_method ?? '' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2 justify-content-center">
        {{ $routes->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
