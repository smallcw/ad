<?php
// +----------------------------------------------------------------------
// | TcAd [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 Tangchao All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tangchao <79300975@qq.com>
// +----------------------------------------------------------------------
namespace plugins\Tcad\model;
use think\Model;

class PluginTcadModel extends Model {
    protected $autoWriteTimestamp = true;

    public function setStartTimeAttr($value) {
        return strtotime($value);
    }

    public function setEndTimeAttr($value) {
        return strtotime($value);
    }

    /**
     * content 自动转化
     * @param $value
     * @return string
     */
    public function getContentAttr($value) {
        return cmf_replace_content_file_url(htmlspecialchars_decode($value));
    }

    /**
     * content 自动转化
     * @param $value
     * @return string
     */
    public function setContentAttr($value) {
        return htmlspecialchars(cmf_replace_content_file_url(htmlspecialchars_decode($value), true));
    }
}