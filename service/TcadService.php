<?php
// +----------------------------------------------------------------------
// | TcAd [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 Tangchao All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tangchao <79300975@qq.com>
// +----------------------------------------------------------------------
namespace plugins\tcad\service;
use plugins\tcad\model\PluginTcadModel;
use think\Db;

class TcadService {
    public static function article($id) {

        $user    = PluginTcadModel::where('id', $id)->cache('ad'.$id)->find();
        if ($user['status'] == 0) {
            return '';
        }

        if ($user['start_time'] > time()) {
            return '';
        }

        if ($user['end_time']) {
            if ($user['end_time'] < time()) {
                return '';
            }
        }

        return $user['content'];
    }
}