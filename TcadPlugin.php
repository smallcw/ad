<?php
// +----------------------------------------------------------------------
// | TcAd [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 Tangchao All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tangchao <79300975@qq.com>
// +----------------------------------------------------------------------
namespace plugins\tcad;
use cmf\lib\Plugin;
use think\Db;

class TcadPlugin extends Plugin {

    public $info = [
        'name'        => 'Tcad',
        'title'       => '自定义广告',
        'description' => '自定义广告',
        'status'      => 1,
        'author'      => 'Tangchao',
        'version'     => '1.0',
        'demo_url'    => 'http://www.songzhenjiang.cn',
        'author_url'  => 'http://www.songzhenjiang.cn',
    ];

    public $hasAdmin = 1;

    public function install() {
        if (file_exists($this->getPluginPath() . 'data/install.lock')) {
            return true;
        }
        //建表
        $config = config('database.');
        $sql    = cmf_split_sql($this->getPluginPath() . 'data/tcad.sql', $config['prefix'], $config['charset']);
        foreach ($sql as &$value) {Db::execute($value);}

        //移动api文件 加入模板设计，若不会使用则不用理会
        $file = $this->getPluginPath() . 'data/AdApi.php';
        file_exists($file) && copy($file, APP_PATH . 'portal/api/AdApi.php');

        touch($this->getPluginPath() . 'data/install.lock');
        return true;
    }

    public function uninstall() {
        $lock = $this->getPluginPath() . 'data/install.lock';
        file_exists($lock) && unlink($lock);

        $file = APP_PATH . 'portal/api/AdApi.php';
        file_exists($file) && unlink($file);

        $config = config('database.');
        Db::execute("drop table if exists {$config['prefix']}_plugin_tcad;");
        return true;
    }
}
