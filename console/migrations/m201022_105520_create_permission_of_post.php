<?php

use yii\db\Migration;

/**
 * Class m201022_105520_create_permission_of_post
 */
class m201022_105520_create_permission_of_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = yii::$app->authManager;

        $create = $auth->createPermission('post-create');
        $create->description = 'Create a Post';
        $auth->add($create);

        $index  = $auth->createPermission('post-index');
        $index->description = 'List a Post';
        $auth->add($index);

        $delete = $auth->createPermission('post-delete');
        $delete->description = 'Delete a Post';
        $auth->add($delete);

        $update = $auth->createPermission('post-update');
        $update->description = 'Update a Post';
        $auth->add($update);

        $view = $auth->createPermission('post-view');
        $view->description = 'view a Post';
        $auth->add($view);

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $auth = yii::$app->authManager;
        $index = $auth->getPermission('post-index');
        if($index){
            $auth->remove($index);
        }
        $create = $auth->getPermission('post-create');
        if($create){
            $auth->remove($create);
        }
        $update = $auth->getPermission('post-update');
        if($update){
            $auth->remove($update);
        }
        $delete = $auth->getPermission('post-delete');
        if($delete){
            $auth->remove($delete);
        }
        $view = $auth->getPermission('post-view');
        if($view){
            $auth->remove($view);
        }

        echo "m201022_105520_create_permission_of_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_105520_create_permission_of_post cannot be reverted.\n";

        return false;
    }
    */
}
