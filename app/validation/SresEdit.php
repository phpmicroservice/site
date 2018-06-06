<?php

namespace app\validation;

use app\model\slide_res;
use pms\Validation;

/**
 * 幻灯片资源 编辑
 * Class SresAdd
 *
 * @package app\validation
 */
class SresEdit extends Validation
{
    /**
     * 验证执行之前执行
     *
     * @param array $data
     * @param object $entity
     * @param Phalcon\Validation\Message\Group $messages
     * @return bool
     */
    public function beforeValidation1($data)
    {
        # type 的范围 1cms 2bbs
        $this->add_in('type', [
            'domain' => [
                '1', '2'
            ],
            'message' => 'typein'
        ]);
        # 验证type是否没变
        $this->add_Validator('type', [
            'name' => Validation\Validator\StatusValidator::class,
            'model' => slide_res::class,
            'status' => [
                'type' => $data['type']
            ],
            'by' => 'id',
            'by_index' => 'id',
            'message' => 'typenoedit'
        ]);
        # 对于关联数据进行验证
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

        return parent::initialize();
    }

}