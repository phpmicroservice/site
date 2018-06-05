<?php

namespace app\validation;

use app\model\slide;
use pms\Validation;

/**
 * Created by PhpStorm.
 * User: toplink_php1
 * Date: 2018/6/4
 * Time: 17:01
 */
class SlideAdd extends Validation
{

    protected function initialize()
    {
        $this->add_uq('identifying', [
            'model' => new slide(),
            'message' => 'uq'
        ]);
        $this->add_stringLength('title', [
            'max' => 20,
            'min' => 4,
            'messageMaximum' => 'strlenmax',
            'messageMinimum' => 'strlenmin'
        ]);

        return parent::initialize();
    }
}