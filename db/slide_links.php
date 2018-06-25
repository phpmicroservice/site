<?php

use Phalcon\Db\Column as Column;
use Phalcon\Db\Index;

return [
    'tableName' => 'slide_links',
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
                    "unsigned" => true
                ]
            ),
            //友情链接名称
            new Column(
                'links_name',
                [
                    "type" => Column::TYPE_VARCHAR,
                    "size" => 10,
                    "notNull" => true
                ]
            )
        ]
    ],
];