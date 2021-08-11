<?php
/**
 * File Name: TraitRegisterController.php
 * ©2020 All right reserved Qiaotongtianxia Network Technology Co., Ltd.
 * @author: hyunsu
 * @date: 2021/5/8 2:23 下午
 * @email: hyunsu@foxmail.com
 * @description:
 * @version: 1.0.0
 * ============================= 版本修正历史记录 ==========================
 * 版 本:          修改时间:          修改人:
 * 修改内容:
 *      //
 */

namespace qh4module\test;


use qh4module\test\external\ExtTest;
use qh4module\test\models\TestBase;

/**
 * Trait TraitTestController
 * 账号注册模块
 * @package qh4module\test
 */
trait TraitTestController
{
    /**
     * @return ExtTest
     */
    public function ext_test()
    {
        return new ExtTest();
    }
    /**
     * 测试接口
     * @return array
     */
    public function actionTest()
    {
        $model = new TestBase([
            'external' => $this->ext_test(),
        ]);

        return $this->runModel($model);
    }
}