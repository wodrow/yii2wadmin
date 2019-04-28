<?php
namespace wodrow\yii2wadmin;

use yii\base\Module;



class WAdminModule extends Module
{
    public $userClassName;
    public $usernameAttribute = "username";
    public $userStatusAttribute = "status";
    public $emailAttribute;
    public $levelAttribute;
    public $integralAttribute;
    public $moneyAttribute;
    public $frozenAttribute;
    public $controllerNamespace = 'wodrow\yii2wadmin\controllers';
}