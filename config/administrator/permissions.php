<?php

use Spatie\Permission\Models\Permission;

return [
    'title' => '权限',
    'single' => '权限',
    'model' => Permission::class,

    'permission' => function () {
        return \Illuminate\Support\Facades\Auth::user()->can('manage_users');
    },

    'action_permissions' => [
        'create' => function ($model) {
            return true;
        },
        'update' => function ($model) {
            return true;
        },
        'delete' => function ($model) {
            return false;
        },
        'view' => function ($model) {
            return true;
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '标示',
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '标示（请慎重修改！）',

            'hint' => '修改权限标示会影响代码调用，请谨慎修改！',
        ],
        'roles' => [
            'title' => '角色',
            'type' => 'relationship',
            'name_field' => 'name',
        ],
    ],
    'filters' => [
        'name' => [
            'title' => '标示',
        ],
    ],
];
