<?php

namespace app\logic;

use app\Base;

class Complaint extends Base
{
    /**
     * 列表
     * @param $where
     * @param $page
     * @param $rows
     * @return \stdClass
     */
    public function lists($where, $page, $rows=10)
    {
        $modelsManager = \Phalcon\Di::getDefault()->get('modelsManager');
        $builder = $modelsManager->createBuilder()
            ->from(\app\model\complaint::class);
        $builder = $this->call_where($builder, $where);
        $paginator = new \pms\Paginator\Adapter\QueryBuilder(
            [
                "builder" => $builder,
                "limit" => $rows,
                "page" => $page,
            ]
        );
        return $paginator->getPaginate();

    }

    /**
     * 处理where条件
     * @param $builder
     * @param $where
     * @return mixed
     */
    private function call_where($builder, $where)
    {
        return $builder;
    }
}