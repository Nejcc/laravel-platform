<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $perPage = 20;
    public $orderBy = 'asc';
    public $orderByInput = 'created_at';
    public $date_format = 'Y-m-d H:i:s';
    public $search = '';

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'search' => 'min:3|string',
        ]);
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::search($this->search)
                ->with('roles')
                ->orderBy($this->orderByInput, $this->orderBy)
                ->paginate($this->perPage)
        ]);
    }
}
