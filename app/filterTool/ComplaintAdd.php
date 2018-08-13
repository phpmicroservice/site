<?php

namespace app\filterTool;

use pms\FilterTool\FilterTool;

class ComplaintAdd extends FilterTool
{
    protected function initialize()
    {
        $this->_Rules[]=['type','string'];
        $this->_Rules[]=['linkman','string'];
        $this->_Rules[]=['tel','string'];
        $this->_Rules[]=['phone','string'];
        $this->_Rules[]=['email','string'];
        $this->_Rules[]=['title','string'];
        $this->_Rules[]=['content','string'];
        $this->_Rules[]=['captcha_value','string'];
        $this->_Rules[]=['captcha_identifying','string'];
    }

}