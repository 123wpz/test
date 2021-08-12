<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 2021-08-11
 * Time: 16:11
 */

namespace qh4module\test\external;


use qttx\web\External;

class ExtTest extends External
{
    /**
     * 生成id,默认使用雪花算法随机生成
     * 有些特定的业务场景,id需要按照一定规则生成,所以预留了该函数
     * 注意数据表id字段最大64位255
     * @return string
     */
    public function generateId()
    {
        return \QTTX::$app->snowflake->id();
    }

    /**
     * 插入完成后执行的方法
     * 这里可以根据实际业务逻辑初始化一些用户的其他信息
     * @param array $info 新插入的基本信息,对应 test 表的数组
     * @param DbModel $db 该函数会被包裹在一个事务中,函数中执行的sql务必使用该句柄
     */
    public function afterTest($info,$db)
    {
        var_dump($info);
    }

    /**
     * 返回 `user` 表名称
     * @return string
     */
    public function testTableName()
    {
        return '{{%test}}';
    }
}