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

    public function singleRand() {
        $arr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33];
        $arr1 = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];

        $red = array_rand($arr,6);
        $blue = array_rand($arr1,1);
        $re['blue'] = $arr[$blue];
        foreach ($red as $key=>$item){
            $index= (string)$key+1;
            $re["red$index"] = $arr[$item];
        }
        return  (object)($re);
    }
    public function rand($num=5){
        $arr = [];
        for ($i=0;$i<$num;$i++) {
            $arr[] = $this->singleRand();
        }
        return $arr;
    }


}