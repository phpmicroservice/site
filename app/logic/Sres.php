<?php

namespace app\logic;

use app\Base;
use app\model\slide_res;
use app\validation\SresAdd;

/**
 * 幻灯片资源关联
 * Class Sres
 * @package app\logic
 */
class Sres extends Base
{

    /**
     * 资源列表
     * @param $slide_id 幻灯片id
     */
    public function lists($slide_id)
    {
        $list = slide_res::find([
            'slide_id = :slide_id:',
            'bind' => [
                'slide_id' => $slide_id
            ]
        ]);
        return $list;

    }

    /**
     * 增加关联
     * @param $data
     */
    public function add($data)
    {
        # 数据过滤和验证
        $validation = new SresAdd();
        if (!$validation->validate($data)) {
            return $validation->getErrorMessages();
        }
        # 验证通过
        $model = new slide_res();
        if (!$model->save($data, ['slide_id', 'type', 'relations_id', 'sort'])) {
            return $model->getMessage();
        }
        return true;
    }


}