<?php

namespace app\logic;

use app\Base;
use app\filterTool\SlideEdit;
use app\validation\SlideAdd;

/**
 * 幻灯片处理
 * Class Slide
 * @package app\logic
 */
class Slide extends Base
{


    /**
     * 增加
     * @param $data
     */
    public function add($data)
    {
        # 进行数据验证
        $va = new SlideAdd();
        if (!$va->validate($data)) {
            return $va->getErrorMessages();
        }
        # 验证通过
        $model = new \app\model\slide();
        if (!$model->save($data, ['title', 'identifying'])) {
            return $model->getMessage();
        }
        return true;
    }

    /**
     * 增加
     * @param $data
     */
    public function edit($data)
    {
        # 进行数据验证
        $va = new \app\validation\SlideEdit();
        if (!$va->validate($data)) {
            return $va->getErrorMessages();
        }
        # 验证通过
        $model = \app\model\slide::findFirstById($data['id']);
        if (!$model->save($data, ['title', 'identifying'])) {
            return $model->getMessage();
        }
        return true;
    }


    /**
     * 列表
     * @param array $where
     * @param int $page
     * @param int $row
     * @return \stdClass
     */
    public function lists($page = 1, $row = 10)
    {
        $builder = $this->modelsManager->createBuilder()
            ->from(\app\model\slide::class)
            ->orderBy("id");

        $paginator = new \pms\Paginator\Adapter\QueryBuilder(
            [
                "builder" => $builder,
                "limit" => $row,
                "page" => $page,
            ]
        );
        return $paginator->getPaginate();
    }


    /**
     * 信息
     * @param int $id
     */
    public function info(int $id)
    {
        $mo = \app\model\slide::findFirst([
            'id =:id:', 'bind' => [
                'id' => $id
            ]
        ]);
        return $mo;
    }

}