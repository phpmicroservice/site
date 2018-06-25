<?php

use Phalcon\Db\Column as Column;
use Phalcon\Db\Index;

return [
    'tableName' => 'slide',
    'schemaName' => null,
    'field' => [
        "columns" => [
            //自增
            new Column(
                "id",
                [
                    "type" => Column::TYPE_INTEGER,
                    "size" => 10,
                    "notNull" => true,
                    "autoIncrement" => true,
                    "primary" => true,
                ]
            ),
            //标题
            new Column(
                'title',
                [
                    "type" => Column::TYPE_INTEGER,
                    "size" => 10,
                    "notNull" => true
                ]
            ),
            //identifying 标识
            new Column(
                "identifying",
                [
                    "type" => Column::TYPE_VARCHAR,
                    "size" => 32,
                    "notNull" => true,
                ]
            ),

        ]
    ],
];