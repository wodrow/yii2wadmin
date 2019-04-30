<?php
namespace wodrow\yii2wadmin\controllers;


use yii\web\Controller;
use yii\web\Response;

class UserController extends Controller
{
    public function actionList()
    {
        $columns = [
//            ['attribute' => null, 'label' => "box"],
            ['attribute' => 'id', 'label' => "ID"],
            ['attribute' => 'tie_id', 'label' => "Tie ID"],
            ['attribute' => null, 'label' => "操作", "defaultContent" => "<button class='edit-btn btn btn-primary btn-sm' type='button'>编辑</button>"],
        ];
        if (\Yii::$app->request->isAjax && \Yii::$app->request->get('draw')){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $dp = Floor::find();
            $recordsTotal = $dp->count();
            $dp = $dp->offset(\Yii::$app->request->get('start'))->limit(\Yii::$app->request->get('length'));
            $ob = \Yii::$app->request->get('order');
            $orderBy = [];
            foreach ($ob as $k => $v){
                if ($columns[$v['column']]['attribute']){
                    if ($v['dir'] == 'asc'){
                        $orderBy = [$columns[$v['column']]['attribute'] => SORT_ASC];
                    }
                    if ($v['dir'] == 'desc'){
                        $orderBy = [$columns[$v['column']]['attribute'] => SORT_DESC];
                    }
                }
            }
            if ($orderBy){
                $dp = $dp->orderBy($orderBy);
            }
            $recordsFiltered = $dp->count();
            $data = $dp->asArray()->all();
            return [
                'draw' => \Yii::$app->request->get('draw'),
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $data,
                'request' => \Yii::$app->request->get(),
            ];
        }
        return $this->render('index', [
            'columns' => $columns,
        ]);
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