<?php
/**
 *------------------------------------------------------
 * SsqModel.php
 *------------------------------------------------------
 *
 * @author    wangzhoudong@foxmail.com
 * @date      2017/11/11 08:29
 * @version   V1.0
 *
 */

namespace App\Models;

class SsqModel extends BaseModel
{
    /**
     * 数据表名
     */
    protected $table = "ssq";

    /**
     * 主键
     */
    protected $primaryKey = "id";

    /**
     * 可以被集体附值的表的字段
     */
    protected $fillable = [
        'issue_date',
        'issue',
        'red1',
        'red2',
        'red3',
        'red4',
        'red5',
        'red6',
        'blue',
        'sales_amount',
        'first_prize',
        'second_prize'
    ];

}