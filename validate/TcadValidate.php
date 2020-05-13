<?php
// +----------------------------------------------------------------------
// | TcAd [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 Tangchao All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tangchao <79300975@qq.com>
// +----------------------------------------------------------------------
namespace plugins\tcad\validate;
use think\Validate;

class TcadValidate extends Validate {
    protected $rule = [
        'name'       => 'require',
        'start_time' => 'require',
        'end_time'   => 'require',
        'content'    => 'require',
    ];

    protected $message = [
        'name'       => '广告名必须',
        'start_time' => '广告开始时间必须',
        'end_time'   => '广告结束时间必须',
        'content'    => '内容必填',
    ];

    protected $scene = [
        'add'  => ['name'],
        'edit' => ['name'],
    ];
}
