<?php

namespace app\controller;

use app\Controller;


class Complaint extends Controller
{


    /**
     * 列表
     */
    public function index()
    {
        $where = [];
        $page = $this->getData('p', 1);
        $logic = new \app\logic\Complaint();
        $re = $logic->lists($where, $page);
        $this->send($re);
    }

    /**
     * 设置状态
     * @return bool
     */
    public function set_status()
    {
        $id = $this->getData('id');
        $model = \app\model\complaint::findFirst($id);
        if ($model instanceof \app\model\complaint) {
            $status = $this->getData('status');
            if (!$model->save(['status' => $status])) {
                return $this->send($model->getMessage());
            }
            return $this->send(true);
        } else {
            $this->send('empty-error');
        }
    }

}