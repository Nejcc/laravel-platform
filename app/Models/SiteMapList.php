<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteMapList extends Model
{
    use HasFactory;

    protected $fillable = [
        'host',
        'uri',
        'name',
        'prefix',
        'action',
        'action_method',
    ];

    public static function search($query)
    {
        return empty($query) ? static::query() : static::query()->whereLike('name', $query);
    }
}
