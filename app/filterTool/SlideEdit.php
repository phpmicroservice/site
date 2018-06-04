<?php

namespace app\filterTool;

use pms\FilterTool\FilterTool;

/**
 * 幻灯片编辑
 */
class SlideEdit extends FilterTool
{
    /**
     * 初始化
     */
    protected function initialize()
    {
        $this->_Rules[] = ['id', 'int'];
        $this->_Rules[] = ['title', 'string'];
        $this->_Rules[] = ['identifying', 'string'];
    }

}