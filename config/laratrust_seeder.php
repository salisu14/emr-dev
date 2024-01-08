<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'physicians' => 'c,r,u,d',
            'patients' => 'c,r,u,d',
            'medications' => 'c,r,u,d',
            'prescriptions' => 'r,u',
            'profile' => 'r,u',
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'physician' => [
            'profile' => 'r,u',
            'prescriptions' => 'c,r,u,d',
            'visits' => 'r,u,d',
        ],
        'patient' => [
            'profile' => 'r,u',
            'prescriptions' => 'r',
            'visits' => 'c,r',
        ],
        'role_name' => [
            'module_1_name' => 'c,r,u,d',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
