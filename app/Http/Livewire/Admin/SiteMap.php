<?php

namespace App\Http\Livewire\Admin;

use App\Models\SiteMapList;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;

class SiteMap extends Component
{
    use WithPagination;

    public $perPage = 100;
    public $orderBy = 'asc';
//    public $orderByInput = 'created_at';
//    public $date_format = 'Y-m-d H:i:s';
    public $search = '';
    public $name = '';
    public $payload = [];

//    public $forceReset = false;

    protected $filter = [
        'debugbar.openhandler',
        'debugbar.clockwork',
        'debugbar.telescope',
        'debugbar.assets.css',
        'debugbar.assets.js',
        'debugbar.cache.delete',
        'ignition.healthCheck',
        'ignition.executeSolution',
        'ignition.shareReport',
        'ignition.scripts',
        'ignition.styles',
        'livewire/message/{name}',
        'livewire/upload-file',
        'livewire/livewire.js',
        'livewire/livewire.js.map',
    ];


    public function mount()
    {
        if(SiteMapList::count() == 0){
            SiteMapList::truncate();
            $this->routeCollection = collect(Route::getRoutes());
            $this->insertRoutes();
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'search' => 'min:3|string',
        ]);
    }

    public function forcereset()
    {
        SiteMapList::truncate();
        $this->routeCollection = collect(Route::getRoutes());
        $this->insertRoutes();
    }

    public function updating()
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        return view('livewire.admin.site-map', [
            'routes' => SiteMapList::search($this->search)->paginate($this->perPage)
        ]);
    }

    private function insertRoutes()
    {
        foreach ($this->routeCollection as $route) {
            if (!in_array([$route->getName()][0], $this->filter)) {
                $route = [
                    'host'          => $route->domain(),
                    'uri'           => $route->uri,
                    'name'          => $route->getName(),
                    'prefix'        => $route->getPrefix(),
                    'action'        => $route->getActionName(),
                    'action_method' => $route->getActionMethod(),
                ];
                SiteMapList::create($route);
            }
        }
    }
}
