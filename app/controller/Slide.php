<?php

namespace app\controller;

use app\filterTool\SlideAdd;
use app\filterTool\SlideEdit;

/**
 * 幻灯片
 * Class Slide
 * @package app\controller
 */
class Slide extends \app\Controller
{

    /**
     * 幻灯片列表
     *
     */
    public function index()
    {
        $server = new \app\logic\Slide();
        $data = $server->lists();
        $this->send($data);
    }

    /**
     * 增加
     */
    public function add()
    {
        $data = $this->getData();
        $ft = new SlideAdd();
        $server = new \app\logic\Slide();
        $re = $server->add($ft->filter($data));
        $this->send($re);
    }

    /**
     * 增加
     */
    public function edit()
    {
        $data = $this->getData();
        $ft = new SlideEdit();
        $server = new \app\logic\Slide();
        $re = $server->edit($ft->filter($data));
        $this->send($re);
    }


}