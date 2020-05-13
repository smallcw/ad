<?php
// +----------------------------------------------------------------------
// | AdApi [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2020 DaliyCode All rights reserved.
// +----------------------------------------------------------------------
// | Author: DaliyCode <3471677985@qq.com> <author_url:dalicode.com>
// +----------------------------------------------------------------------

namespace app\portal\api;

use plugins\tcad\model\PluginTcadModel;
use think\db\Query;

class AdApi {
    /**
     * 广告列表 用于模板设计
     * @param array $param
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function index($param = []) {
        $model = new PluginTcadModel();

        $where = [
            'status'      => 1,
            'delete_time' => 0,
        ];
        $whereAnd[] = ['start_time', 'elt', time()];
        $whereAnd[] = ['end_time', 'gt', time()];
        //返回的数据必须是数据集或数组,item里必须包括id,name,如果想表示层级关系请加上 parent_id
        return $model->field('id,name,remark')
            ->where($where)
            ->where($whereAnd)
            ->where(function (Query $query) use ($param) {
                if (!empty($param['keyword'])) {
                    $query->where('name', 'like', "%{$param['keyword']}%");
                }
            })->select();
    }
}