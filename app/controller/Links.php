<?php

namespace app\controller;


use app\Controller;

/**
 * 友情连接的相关控制器
 * Class Links
 * @package app\controller
 */
class Links extends Controller
{
    /**
     * 列表
     */
    public function index()
    {
       $links = new silde_links();
        echo'123';
        //var_dump($links);
    }

    /**
     * 增加友情连接
     */
    public function add()
    {

    }

    /**
     * 编辑友情连接
     */
    public function edit()
    {


    }

    /**
     * 信息,单条
     */
    public function info()
    {


    }

    /**
     * 友情连接的删除
     */
    public function delete()
    {

    }
}