<?php

use Phalcon\Db\Column as Column;
use Phalcon\Db\Index;

return [
    'tableName' => 'slide_res',
    'schemaName' => null,
    'field' => [
        "columns" => [
            //自增
            new Column(
                "id",
                [
                    "type" => Column::TYPE_INTEGER,
                    "size" => 11,
                    "notNull" => true,
                    "autoIncrement" => true,
                    "primary" => true,
                ]
            ),
            //slide_id 幻灯片的id
            new Column(
                'slide_id',
                [
                    "type" => Column::TYPE_INTEGER,
                    "size" => 11,
                    "notNull" => true
                ]
            ),
            //类型 1cms 2论坛
            new Column(
                "type",
                [
                    "type" => Column::TYPE_INTEGER,
                    "size" => 2,
                    "notNull" => true,
                ]
            ),
            //关联的id
            new Column(
                "relations_id",
                [
                    "type" => Column::TYPE_INTEGER,
                    "size" => 11,
                    "notNull" => true,
                ]
            ),
            //sort 排序
            new Column(
                "sort",
                [
                    "type" => Column::TYPE_INTEGER,
                    "size" => 11,
                    "notNull" => true,
                ]
            ),
        ],
        'indexes' => [
            new Index('slide_id', [`slide_id`, `type`, `relations_id`], 'UNIQUE'),
        ],
    ],
];