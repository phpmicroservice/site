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
            "我是" . SERVICE_NAME . "分组1",
            '2018年6月28日16:21:43',
            '当前登陆的用户是：' . $this->session->get('user_id'),
            mt_rand(1, 99999)
        ]);
    }




    /**
     * 测试的
     * @param $data
     */
    public function server()
    {
        $this->connect->send_succee([
            $this->getData(),
            "我是" . SERVICE_NAME . "分组",
            '来自服务：' . $this->connect->f,
            mt_rand(1, 99999)
        ]);
    }



}