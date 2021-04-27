<?php

return [
    'payload' => [
        'payload_admin' => [
            'users'       => ['view', 'show', 'create', 'edit', 'activate', 'deactivate', 'manage'],
            'roles'       => ['view', 'show', 'create', 'edit', 'activate', 'deactivate', 'manage'],
            'permissions' => ['view', 'show', 'create', 'edit', 'activate', 'deactivate', 'manage'],
            'articles'    => ['view', 'show', 'create', 'edit', 'activate', 'deactivate', 'manage'],
        ],
    ],

    'menu' => [
        'dashboard' => ['view'],
        'profile'   => ['view'],
    ],


];
