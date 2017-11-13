<?php
/**
 *------------------------------------------------------
 * dealOrderData.php
 *------------------------------------------------------
 *
 * @author    qqiu@qq.com
 * @version   V1.0
 *
 */

namespace App\Console;

use App\Models\SsqModel;

class dealSsqData
{

    public static function update() {
        $crawler = \Goutte::request('GET', 'http://kaijiang.zhcw.com/zhcw/html/ssq/list.html');
        $crawler->filter('.wqhgt tr')->each(function ($node,$i) {
            //只检查前两条是否有更新
            if($i>1 && $i<4) {
                $data['issue'] = $node->filter('td')->eq(1)->text();
                $data['issue_date'] = $node->filter('td ')->eq(0)->text();
                $data['red1'] = $node->filter('td ')->eq(2)->filter('em')->eq(0)->text();
                $data['red2'] = $node->filter('td ')->eq(2)->filter('em')->eq(1)->text();
                $data['red3'] = $node->filter('td ')->eq(2)->filter('em')->eq(2)->text();
                $data['red4'] = $node->filter('td ')->eq(2)->filter('em')->eq(3)->text();
                $data['red5'] = $node->filter('td ')->eq(2)->filter('em')->eq(4)->text();
                $data['red6'] = $node->filter('td ')->eq(2)->filter('em')->eq(5)->text();
                $data['blue'] = $node->filter('td ')->eq(2)->filter('em')->eq(6)->text();
                $data['sales_amount'] = (int)trim(str_replace(',','',$node->filter('td')->eq(3)->filter('strong')->text()));
                $data['first_prize'] = (int)$node->filter('td ')->eq(4)->filter('strong')->text();
                $data['second_prize'] = (int)$node->filter('td ')->eq(5)->filter('strong')->text();
                $ok = SsqModel::updateOrCreate(['issue'=>$data['issue']],$data);
                if(!$ok) {
                    echo "创建失败" . $data['issue'] . "\r\n";
                }else{
                    echo $data['issue'] . "\r\n";
                }
            }
        });
    }


    /**
     * 定期取消支付超时订单
     * @return bool
     */
    public static function all()
    {
        for($i=1;$i<=110;$i++) {
            echo $i . "\r\n";
            $crawler = \Goutte::request('GET', 'http://kaijiang.zhcw.com/zhcw/html/ssq/list_' . $i . '.html');
            $crawler->filter('.wqhgt tr')->each(function ($node,$i){
                if($i>1 && $node->filter('td ')->eq(0)->attr('colspan')!=7) {
                    $data['issue_date'] = $node->filter('td ')->eq(0)->text();
                    $data['issue'] = $node->filter('td ')->eq(1)->text();
                    $data['red1'] = $node->filter('td ')->eq(2)->filter('em')->eq(0)->text();
                    $data['red2'] = $node->filter('td ')->eq(2)->filter('em')->eq(1)->text();
                    $data['red3'] = $node->filter('td ')->eq(2)->filter('em')->eq(2)->text();
                    $data['red4'] = $node->filter('td ')->eq(2)->filter('em')->eq(3)->text();
                    $data['red5'] = $node->filter('td ')->eq(2)->filter('em')->eq(4)->text();
                    $data['red6'] = $node->filter('td ')->eq(2)->filter('em')->eq(5)->text();
                    $data['blue'] = $node->filter('td ')->eq(2)->filter('em')->eq(6)->text();
                    $data['sales_amount'] = str_replace(',','',$node->filter('td ')->eq(3)->text());
                    $data['first_prize'] = $node->filter('td ')->eq(4)->filter('strong')->text();
                    $data['second_prize'] = $node->filter('td ')->eq(5)->filter('strong')->text();
                    $ok = SsqModel::create($data);
                    if(!$ok) {
                        echo "创建失败" . $data['issue'] . "\r\n";
                    }else{
                        echo $data['issue'] . "\r\n";
                    }
                }
            });
        }

    }

}