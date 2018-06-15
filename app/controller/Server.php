<?php

namespace app\controller;

use app\Controller;

/**
 * 服务间的东西
 * Class Server
 * @package app\controller
 */
class Server extends Controller
{

    public function slideinfo()
    {
        $slide_id = $this->getData('slide_id');
        $server = new \app\logic\Sres();
        $re = $server->lists($slide_id);
        $this->send($re);
    }

    public function slidebyname()
    {
        $slide_name = $this->getData('name');
        $server = new \app\logic\Sres();
        $re = $server->lists_by_name($slide_name);
        $this->send($re);
    }

}