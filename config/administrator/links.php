<?php

use App\Models\Link;

return [
    'title' => '固定连接',
    'single' => '固定连接',

    'model' => Link::class,

    'permission' => function () {
        return \Illuminate\Support\Facades\Auth::user()->hasRole('Founder');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title' => '名称',
            'sortable' => false,
        ],
        'link' => [
            'title' => '链接',
            'sortable' => false,
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'title' => [
            'title' => '标题',
        ],
        'link' => ['title' => '链接',],
    ],
    'filters' => [
        'id' => ['title' => '标签 ID',],
        'title' => ['title' => '名称',],
    ],
];
