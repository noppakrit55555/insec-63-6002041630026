<?php

use yii\db\Migration;

/**
 * Class m201106_025714_create_assign_user
 */
class m201106_025714_create_assign_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->init();

        $author=$auth->getRole('author');
        $admin=$auth->getRole('admin');
        $superadmin=$auth->getRole('super-admin');

        $auth->assign($author, 1);
        $auth->assign($admin, 2);
        $auth->assign($superadmin, 3);
      
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->init();

        $author =$auth->getRole('author');
        $admin=$auth->getRole('admin');
        $superadmin=$auth->getRole('super-admin');

        $auth->revoke($author, 1);
        $auth->revoke($admin, 2);
        $auth->revoke($superadmin, 3);

        return false;
    }
}
