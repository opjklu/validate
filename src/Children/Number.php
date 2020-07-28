<?php
// +----------------------------------------------------------------------
// | OnlineRetailers [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
 // | Copyright (c) 2010-2023 www.wq520wq.cn All rights reserved..
// +----------------------------------------------------------------------
// | 端庄、优雅、闲庭
// +----------------------------------------------------------------------
// | Author: 王强 <13052079525>
// +----------------------------------------------------------------------
// |简单与丰富！
// +----------------------------------------------------------------------
// |让外表简单一点，内涵就会更丰富一点。
// +----------------------------------------------------------------------
// |让需求简单一点，心灵就会更丰富一点。
// +----------------------------------------------------------------------
// |让言语简单一点，沟通就会更丰富一点。
// +----------------------------------------------------------------------
// |让私心简单一点，友情就会更丰富一点。
// +----------------------------------------------------------------------
// |让情绪简单一点，人生就会更丰富一点。
// +----------------------------------------------------------------------
// |让环境简单一点，空间就会更丰富一点。
// +----------------------------------------------------------------------
// |让爱情简单一点，幸福就会更丰富一点。
// +----------------------------------------------------------------------
declare(strict_types = 1);

namespace Validate\Children;

use Validate\Validate;
use Validate\Common\CommonAttribute;

/**
 * 特殊检测类
 * 验证规则是否是数字
 * @author Administrator
 */
class Number implements Validate
{
    use CommonAttribute;
    
    /**
     * 架构方法
     */
    public function __construct(array $data, $message = '')
    {
        $this->data = $data;
        
        $this->message = $message;
    }
    /**
     * 
     * {@inheritDoc}
     * @see \Validate\Validate::check(string $key) :bool
     */
    public function check(string $key) :bool
    {
        
        if (!isset($this->data[$key])) {
            return true;
        }
        
        if (!is_numeric($this->data[$key])) {
            return false;
        }
       
        $str = '';
        if (false !== ($length = strpos($this->message, '${'))) {
            $str = str_replace(['${', '}'], ['', ''], substr($this->message, $length));
        }
       
        if (empty($str)) {
            return true;
        }
       
        list($first, $second) = explode('-', $str);
        
        if ( $first > $this->data[$key] || $this->data[$key] > $second) {
            return false;
        }
        
        return true;
    }
}