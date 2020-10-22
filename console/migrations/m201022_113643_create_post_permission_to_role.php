<?php

use yii\db\Migration;

/**
 * Class m201022_113643_create_post_permission_to_role
 */
class m201022_113643_create_post_permission_to_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        //get role
        $auth = yii::$app->authManager;
        $author = $auth->getRole('author');
        $admin = $auth->getRole('admin');
        $superAdmin = $auth->getRole('super-admin');


        //get permission
        $listPost =  $auth->getPermission('post-index');
        $viewPost=  $auth->getPermission('post-view');
        $createPost =  $auth->getPermission('post-create');
        $updatePost =  $auth->getPermission('post-update');
        $deletePost =  $auth->getPermission('post-delete');

        // assign
        $auth->addChild($author, $createPost);
        $auth->addChild($author, $listPost);
        $auth->addChild($author, $viewPost);
        $auth->addChild($author, $updatePost);
       
        $auth->addChild($admin, $author);
        $auth->addChild($superAdmin, $deletePost);

     
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

      
    $auth = yii::$app->authManager;
    $author = $auth->getRole('author');
    $admin = $auth->getRole('admin');
    $superAdmin = $auth->getRole('super-admin');


    //get permission
    $listPost =  $auth->getPermission('post-index');
    $viewPost=  $auth->getPermission('post-view');
    $createPost =  $auth->getPermission('post-create');
    $updatePost =  $auth->getPermission('post-update');
    $deletePost =  $auth->getPermission('post-delete');

    // assign
    $auth->removeChild($author, $createPost);
    $auth->removeChild($author, $listPost);
    $auth->removeChild($author, $viewPost);
    $auth->removeChild($author, $updatePost);
   
    $auth->removeChild($admin, $author);
    $auth->removeChild($superAdmin, $deletePost);

        echo "m201022_113643_create_post_permission_to_role cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_113643_create_post_permission_to_role cannot be reverted.\n";

        return false;
    }
    */
}
