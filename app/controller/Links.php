<?php

namespace app\controller;

use app\model\slide_links;

use app\Controller;

use Phalcon\Filter;

use Phalcon\Validation;

use Phalcon\Validation\Validator\PresenceOf;
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
        $links = new slide_links();
        $list_links = $links::find();
        $this->send($list_links->toArray());

    }

    /**
     * 增加友情连接
     */
    public function add()
    {
        //获取数据
        $name = $this->getData('links_name');
        //实例化过滤(验证类)
        $filter = new Filter();
        //过滤数据
        $links_name = $filter->sanitize($name, "string");
        //实例化验证
        $validation = new Validation();
        //验证数据
        $validation->add(
            "links_name",//这个字段是验证的字段名
            new PresenceOf(
                [
                    "message" => "The links_name is required",
                ]
            )
        );

        $messages = $validation->validate(['links_name'=>$links_name]);

        if (count($messages)>0) {
            $this->send($messages);
        }

        $links = new slide_links();
        $success = $links->save(['links_name'=>$links_name]);
        if (!($success ===false)) {
            echo'添加成功';
            $list_links = $links::find();
            $this->send($list_links->toArray());
        } else {
            $messages = $links->getMessages();
            echo'添加失败';
            $this->send($messages);
        }


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