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

}