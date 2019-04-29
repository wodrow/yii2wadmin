<?php
namespace wodrow\yii2wadmin\controllers;


use yii\web\Controller;
use yii\web\Response;

class UserController extends Controller
{
    public function actionList()
    {
        $userClassName = $this->module->userClassName;
        $users = $userClassName::find()->all();
        // var_dump($users);exit;
        return $this->render('list', ['users' => $users]);
    }

    public function actionDtAjaxList()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $usernameAttribute = \Yii::$app->controller->module->usernameAttribute;
        $userStatusAttribute = \Yii::$app->controller->module->userStatusAttribute;
        $userClassName = $this->module->userClassName;
        $recordsTotal = $userClassName::find()->count();
        $recordsFiltered = $userClassName::find()->count();
        $users = $userClassName::find()->all();
        $data = [];
        foreach($users as $k => $v){
            $data[] = [$v->$usernameAttribute, $v->$userStatusAttribute];
        }
        return [
            "draw" => \Yii::$app->request->get('draw'),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data,
        ];
    }
}