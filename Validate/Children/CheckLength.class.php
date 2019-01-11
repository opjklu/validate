<?php
namespace Validate\Children;

use Validate\Validate;
use Validate\Common\CommonAttribute;

/**
 * 验证规则是否是正确的电话号码
 * @author Administrator
 */
class CheckLength implements Validate
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
     * 非空验证长度
     * {@inheritDoc}
     * @see \Validate\Validate::check(string $key)
     */
    public function check(string $key)
    {
        if (!empty($this->data[$key])) {
            
            $length = strlen($this->data[$key]);
            
            return $length <= 6 ? false : true;
        }
        return true;
    }
}