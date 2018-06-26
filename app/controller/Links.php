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
        $links_net = $this->getData('links_net');
        //实例化过滤(验证类)
        $filter = new Filter();
        //过滤数据
        $links_name = $filter->sanitize($name, "string");
        // 使用匿名函数(自定义)
        $filter->add(
            "links_net",
            function ($value) {
                return preg_match('#^(http|https|ftp)://([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?/i#', $value);
            }
        );

        // 利用links_net过滤器清理
        $filtered = $filter->sanitize($links_net, "links_net");
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

        $messages = $validation->validate(['links_name' => $links_name]);

        $validation->add(
            "links_net",//这个字段是验证的字段名
            new PresenceOf(
                [
                    "message" => "The links_net is required",
                ]
            )
        );

        $messages = $validation->validate(['links_net' => $links_net]);

        if (count($messages) > 0) {
            $this->send($messages);
        }

        $links = new slide_links();
        $success = $links->save(['links_name' => $links_name,'links_net'=>$links_net]);
        if (!($success === false)) {
            echo '添加成功';
            $list_links = $links::find();
            $this->send($list_links->toArray());
        } else {
            $messages = $links->getMessages();
            echo '添加失败';
            $this->send($messages);
        }


    }

    /**
     * 编辑友情连接
     */
    public function edit()
    {
        //获取数据
        $id = $this->getData('id');
        //实例化过滤(验证类)
        $filter = new Filter();
        //过滤数据
        $id = $filter->sanitize($id, "int");
        //实例化验证
        $validation = new Validation();
        //验证数据
        $validation->add(
            "id",//这个字段是验证的字段名
            new PresenceOf(
                [
                    "message" => "The id is required",
                ]
            )
        );
        $messages = $validation->validate(['id' => $id]);

        if (count($messages) > 0) {
            $this->send($messages);
        }
        $slide_links_model = new slide_links();
        $link = $slide_links_model::findFirst($id);

        if (!$link) {
            $messages = $slide_links_model->getMessage();
            echo '无修改项';
            $this->send($messages);
        }

        $links_name = $this->getData('links_name');
        $links_net = $this->getData('links_net');
        if ($links_name) {
            $links_name = $filter->sanitize($links_name, "string");
        }
        if ($links_net) {
            $filter->add(
                "links_net",
                function ($value) {
                    return preg_match('#^(http|https|ftp)://([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?/i#', $value);
                }
            );
    
            // 利用links_net过滤器清理
            $filtered = $filter->sanitize($links_net, "links_net");
        }
        $success = $link->save(["links_name" => $links_name,"links_net"=>$links_net]);
        if ($success) {
            echo '修改成功';
            $lists = $slide_links_model::find();
            $this->send($lists->toArray());
        } else {
            echo '修改失败';
            $messages = $link->getMessages();
            $this->send($messages);
        }  
    }

    /**
     * 信息,单条
     */
    public function info()
    {
        $id = $this->getData('id');
        $filter = new Filter();
        $id = $filter->sanitize($id, 'int');
        $validation = new Validation();
        $validation->add(
            "id",
            new PresenceOf(
                [
                    "message" => "The id is required",
                ]
            )
        );
        $messages = $validation->validate(['id' => $id]);
        $slide_links_model = new slide_links();
        $link = $slide_links_model::findFirst($id);
        if ($link) {
            echo '查询成功';
            $this->send($link->toArray());
        } else {
            echo '查询失败';
            $messages = $link->getMessages();
            $this->send($messages);
        }
    }

    /**
     * 友情连接的删除
     */
    public function delete()
    {
        $id = $this->getData('id');
        $filter = new Filter();
        $id = $filter->sanitize($id, 'int');
        $validation = new Validation();

        $validation->add('id',
            new PresenceOf(["message" => "The id is required "]
            )
        );
        $messages = $validation->validate(['id' => $id]);
        $slide_links_model = new slide_links();
        $info = $slide_links_model::findFirst($id);
        if (!($info instanceof slide_links)) {
            return $this->send("数据错误!");
        }
        $success = $info->delete();
        if ($success) {
            echo '删除成功';
            $links = $slide_links_model::find();
            $this->send($links->toArray());
        } else {
            echo '删除失败';
            $messages = $info->getMessages();
            $this->send($messages);
        }
    }
}