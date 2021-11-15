<?php
/**
 * Created by : PhpStorm
 * User: Tlang
 * Date: 2021/11/15
 * Time: 9:50
 */

class Tool
{

    /**
     * 经典的概率算法，
     * $proArr是一个预先设置的数组，
     * 假设数组为：array(100,200,300，400)，
     * 开始是从1,1000 这个概率范围内筛选第一个数是否在他的出现概率范围之内，
     * 如果不在，则将概率空间，也就是k的值减去刚刚的那个数字的概率空间，
     * 在本例当中就是减去100，也就是说第二个数是在1，900这个范围内筛选的。
     * 这样 筛选到最终，总会有一个数满足要求。
     * 就相当于去一个箱子里摸东西，
     * 第一个不是，第二个不是，第三个还不是，那最后一个一定是。
     * 这个算法简单，而且效率非常高，
     * 这个算法在大数据量的项目中效率非常棒。
     *
     * @param array $proArr
     * @return int
     */
    public static function getRand(array $proArr)
    {
        $result = 0;
        try {
            //概率数组的总概率精度
            $proSum = array_sum($proArr);
            //概率数组循环
            foreach ($proArr as $key => $proCur) {
                $randNum = mt_rand(1, $proSum);
                if ($randNum <= $proCur) {
                    $result = $key;
                    break;
                } else {
                    $proSum -= $proCur;
                }
            }
            if (is_numeric($result)) {
                return $result;
            }
        } catch (Exception $e) {
        }
        return 0;
    }
}