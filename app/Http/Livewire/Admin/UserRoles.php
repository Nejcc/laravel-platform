<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoles extends Component
{
    public $is_searcheable = false;
    public $name = '';

    protected $rules = [
        'name' => 'min:3|string|unique:roles',
    ];

    public function createNewRole()
    {
        $this->validate();

        if (!empty($this->name)) {
            Role::create([
                'name' => $this->name
            ]);

            session()->flash('message', 'New Role added successfuly!');

            $this->name = '';
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'min:3|string|unique:roles',
        ]);
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        return view('livewire.admin.user-roles', [
            'roles'       => Role::paginate(20),
        ]);
    }
}
