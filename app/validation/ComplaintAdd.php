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
        # 验证码
        $this->add_required(['captcha_value', 'captcha_identifying'], [
            'message' => 'required'
        ]);
        $this->add_in('type', [
            'domain' => [
                'person', 'company'
            ]
        ]);
        $this->add_email('email', [
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

    # 投诉验证码
    public function beforeValidation1($data)
    {
        # 验证码
        $this->add_Validator('captcha_value', [
            'name' => Validation\Validator\ServerAction::class,
            'server_action' => 'validation@/server/true_check',
            'data' => [
                "sn" => 'site',
                "operation" => 'complaint',
                "value" => $data['captcha_value'],
                "identifying" => $data['captcha_identifying']
            ],
            'message' => 'captcha'
        ]);
    }
}