<?php
namespace wodrow\yii2wadmin\controllers;


use yii\web\Controller;

class UserController extends Controller
{
    public function actionList()
    {
        // $userClassName = $this->module->userClassName;
        // $users = $userClassName::find()->asArray()->all();
        // var_dump($users);exit;
        return $this->render('list');
    }
}