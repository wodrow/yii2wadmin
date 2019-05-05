<?php
/**
 * @var \yii\web\View $this
 */

 use wodrow\yii2wtools\tools\JsBlock;
 use yii\helpers\Url;

$this->title = "列表";
?>

<div class="">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Status</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Username</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>
</div>

<?php JsBlock::begin(); ?>
<script>
$(document).ready(function() {
    alert(1);
});
</script>
<?php JsBlock::end(); ?>