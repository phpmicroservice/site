<?php

namespace app\filterTool;

use pms\FilterTool\FilterTool;

/**
 * 幻灯片资源 编辑 的过滤器
 * Class SresEdit
 * @package app\filterTool
 */
class SresEdit extends FilterTool
{
    /**
     * 初始化
     */
    protected function initialize()
    {
        $this->_Rules[] = ['id', 'int'];
        $this->_Rules[] = ['type', 'int'];
        $this->_Rules[] = ['relations_id', 'int'];
        $this->_Rules[] = ['sort', 'int'];

    }


}