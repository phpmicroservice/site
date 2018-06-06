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

    /**
     * 获取信息
     */
    public function info()
    {
        $id = $this->getData('id');
        $server = new \app\logic\Slide();
        $re = $server->info((int)$id);
        $this->send($re);
    }

    /**
     * 资源列表
     */
    public function res_list()
    {
        $slide_id = $this->getData('slide_id');
        $server = new \app\logic\Sres();
        $re = $server->lists($slide_id);
        $this->send($re);
    }


    /**
     * 增加幻灯片的资源
     */
    public function res_add()
    {
        $data = $this->getData();
        $server = new \app\logic\Sres();
        $re = $server->add($data);
        $this->send($re);
    }

    /**
     * 增加幻灯片的资源
     */
    public function res_edit()
    {
        $data = $this->getData();
        $server = new \app\logic\Sres();
        $re = $server->edit($data);
        $this->send($re);
    }


}