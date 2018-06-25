<?php
namespace app\filter;
/**
 * Ipv4 过滤器
 */
class Ipv4 implements \Phalcon\Filter\UserFilterInterface {
    public function filter($value){
        // 进行过滤操作
        $value =$value.'1515';
        return $value;
    }
}