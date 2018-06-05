<?php

namespace app\validation;

use pms\Validation;

/**
 * 幻灯片资源增加
 * Class SresAdd
 *
 * @package app\validation
 */
class SresAdd extends Validation
{
    /**
     * 验证执行之前执行
     *
     * @param array $data
     * @param object $entity
     * @param Phalcon\Validation\Message\Group $messages
     * @return bool
     */
    public function beforeValidation($data, $entity, $messages)
    {
        if ($data['type'] == '1') {
            # cms验证
            $this->add_Validator('relations_id', [
                'name' => Validation\Validator\ServerAction::class,
                'server_action' => 'cms@/server/va_ex',
                'data' => ['id' => $data['relations_id']],
                'message' => 'relation'
            ]);
        }
        if ($data['type'] == '2') {
            # bbs 主题验证
            $this->add_Validator('relations_id', [
                'name' => Validation\Validator\ServerAction::class,
                'server_action' => 'bbs@/server/vasubject_ex',
                'data' => ['id' => $data['relations_id']],
                'message' => 'relation'
            ]);
        }
    }

    protected function initialize()
    {
        $this->add_in('type', [
            'domain' => [
                '1', '2'
            ],
            'message' => 'typein'
        ]);
        return parent::initialize();
    }

}