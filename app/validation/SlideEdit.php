<?php

namespace app\validation;

use pms\Validation;
use app\model\slide;


class SlideEdit extends Validation
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