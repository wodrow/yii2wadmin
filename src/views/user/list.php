<?php
/**
 * @var \yii\web\View $this
 * @var \yii\base\Model[] $users
 */

\fedemotta\datatables\DataTablesAsset::register($this);

$this->title = "列表";
$usernameAttribute = \Yii::$app->controller->module->usernameAttribute;
$userStatusAttribute = \Yii::$app->controller->module->userStatusAttribute;
?>

<div class="">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $k => $v): ?>
                <tr>
                    <td><?=$v->$usernameAttribute ?></td>
                </tr>
                <tr>
                    <td><?=$v->$userStatusAttribute ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>
</div>