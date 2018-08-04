<?php

namespace app\validation;

use pms\Validation;

class ComplaintAdd extends Validation
{

    protected function initialize()
    {
        $this->add_required(['type', 'linkman', 'tel', 'email', 'title', 'content'], [
            'message' => 'required'
        ]);
        $this->add_in('type',[
            'domain'=>[
                'person', 'company'
            ]
        ]);
        $this->add_email('email',[
            'message' => 'required'
        ]);

        $this->add_stringLength('title', [
            'min' => 1,
            'max' => 30,
        ]);
        $this->add_stringLength('content', [
            'min' => 1,
            'max' => 1000,
        ]);
        return parent::initialize();
    }
}