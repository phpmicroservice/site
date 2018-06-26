<?php

namespace app\controller;

use app\Controller;

use app\model\slide_servicetype;

use phalcon\Filter;

use Phalcon\Validation;

use Phalcon\Validation\Validator\PresenceOf;

/**
 * 服务类型的相关控制器
 * Class Links
 * @package app\controller
 */
class servicetype extends controller
{
    /**
     * 列表
     */
    public function index()
    {
        $list = new slide_servicetype();
        $list = $list::find();
        $this->send($list->toArray());
    }
    /**
     * 增加服务类型
     */
    public function add()
    {
        $st_name = $this->getData('st_name');
        $filter = new Filter();
        $st_name = $filter->sanitize($st_name,'string');
        $validation = new Validation();
        $validation->add(
            "st_name",//这个字段是验证的字段名
            new PresenceOf(
                [
                    "message" => "The st_name is required",
                ]
            )
        );
        $messages = $validation->validate(['st_name' => $st_name]);

        if (count($messages > 0)) {
            $this->send($messages);
        }

        $st = new slide_servicetype();
        $success = $st->save(['st_name' => $st_name]);
        if (!($success === false)) {
            echo '添加成功';
            $list = $st::find();
            $this->send($list->toArray());
        } else {
            $messages = $st->getMessages();
            echo '添加失败';
            $this->send($messages);
        }

    }



    
}
