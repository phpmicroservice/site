<?php

namespace app\controller;
/**
 * 测试
 * Class Demo
 * @package app\controller
 */
class Demo extends \app\Controller
{


    /**
     * 测试的
     * @param $data
     */
    public function index()
    {
        $this->connect->send_succee([
            $this->getData(),
            "我是" . SERVICE_NAME . "分组",
            '当前登陆的用户是：' . $this->session->get('user_id'),
            mt_rand(1, 99999)
        ]);
    }


}