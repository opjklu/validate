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
 * 验证中英文姓名
 * @author Administrator
 *
 */
class CheckChineseOrEnglish implements Validate
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
	 * @see \Validate\Validate::check(string $key) :bool
	 */
	public function check(string $key) :bool
	{ 
	    if (!isset($this->data[$key])) {
			return true;
		}
		
		return preg_match("/^([\x{4e00}-\x{9fa5}]+)$/u", $this->data[$key]) && !preg_match("/^[a-zA-Z]+$/i", $this->data[$key]) !== false;
	}
}