<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(PermissionType::class, 'permission_type_id', 'id');
    }
}
