<?php

namespace app\controller;

use app\Controller;
use app\filterTool\ComplaintAdd;

class Index extends Controller
{
    /**
     * 新投诉
     */
    public function complaint_add()
    {
        $data = $this->getData();
        $ft = new ComplaintAdd();
        $ft->filter($data);
        $validation = new \app\validation\ComplaintAdd();
        if (!$validation->validate($data)) {
            return $this->send($validation->getErrorMessages());
        }
        $data['phone']=$data['phone'] ??'';
        $data['status'] = 0;
        $model = new \app\model\complaint();
        $model->setData($data);
        if (!$model->save()) {
            return $this->send($model->getMessage());
        }
        $this->send(true);
    }

    public function server_info()
    {
        $this->send([
            'php'=>phpversion(),
            'swoole'=>swoole_version(),
            'phalcon'=>\Phalcon\Version::get()
        ]);
    }

}