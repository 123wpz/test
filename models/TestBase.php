<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 2021-08-11
 * Time: 16:23
 */

namespace qh4module\test\models;


use qh4module\test\external\ExtTest;
use qttx\web\ServiceModel;

class TestBase extends ServiceModel
{
    /*
     * 接口参数token 必填
     */
    public $token;
    /**
     * @var ExtTest
     */
    protected $external;
    /**
     * 测试方法
     */
    public function run()
    {
        $db = $this->external->getDb();
        $db->beginTrans();
        try{
            //生成id 通过生成用户id的雪花算法生成id
            $id = $this->external->generateId();
            
            //插入测试表数据
            $test_cols = $this->insertTest($id,$db);
            
            //插入成功后
            $this->external->afterTest($test_cols,$db);

            $db->commitTrans();
        } catch (\Exception $exception) {
            $db->rollBackTrans();
            throw $exception;
        }
    }
    
    /*
     * 插入测试表数据 私用
     */
    protected function insertTest($id,$db){
        $cols = [
            'id' => $id,
            'create_time' => time(),
            'token' => $this->token,
        ];

        $db->insert($this->external->testTableName())
            ->cols($cols)
            ->query();

        return $cols;
    }
}