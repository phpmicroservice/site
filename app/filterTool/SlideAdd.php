<?php

namespace app\filterTool;

use pms\FilterTool\FilterTool;

/**
 * 幻灯片增加
 */
class SlideAdd extends FilterTool
{
    /**
     * 初始化
     */
    protected function initialize()
    {
        $this->_Rules[] = ['title', 'string'];
        $this->_Rules[] = ['identifying', 'string'];
    }

}