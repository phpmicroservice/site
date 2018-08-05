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
     * 设置 已解决
     * @return bool
     */
    public function set_status2()
    {
        $id = $this->getData('id');
        $model = \app\model\complaint::findFirst($id);
        if ($model instanceof \app\model\complaint) {
            $staff=$this->getData('staff');
            $c_func=$this->getData('c_func');
            if (!$model->save([
                'status' => 2,
                'staff'=>$staff,
                'c_func'=>$c_func
            ])) {
                return $this->send($model->getMessage());
            }
            return $this->send(true);
        } else {
            $this->send('empty-error');
        }
    }

    /**
     * 设置 解决中
     * @return bool
     */
    public function set_status1()
    {
        $id = $this->getData('id');
        $model = \app\model\complaint::findFirst($id);
        if ($model instanceof \app\model\complaint) {

            if (!$model->save(['status' => 1])) {
                return $this->send($model->getMessage());
            }
            return $this->send(true);
        } else {
            $this->send('empty-error');
        }
    }

    /**
     * 单条信息
     * @return bool
     */
    public function info()
    {
        $id = $this->getData('id');
        $model = \app\model\complaint::findFirst($id);
        if ($model instanceof \app\model\complaint) {

            return $this->send($model->toArray());
        } else {
            $this->send('empty-error');
        }
    }



}