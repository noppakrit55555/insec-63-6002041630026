<?php
namespace common\components;
class User extends \yii\web\User 
{
   public $identityClass = '\common\models\User';
   //login
   public function checkAccess($operation, $params = [], $allowCaching = true) {
    // Always return true when SuperAdmin user
    if (
        \Yii::$app->user->id == 3 && \Yii::$app->user->username == 'admin' 
    ) {
        return true;
    }
    return parent::can($operation, $params, $allowCaching);
    }
}