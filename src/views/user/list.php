<?php
/**
 * @var \yii\web\View $this
 */

 use wodrow\yii2wtools\tools\JsBlock;
 use yii\helpers\Url;

\fedemotta\datatables\DataTablesAsset::register($this);

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
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "<?=Url::to(['user/dt-ajax-list']) ?>"
    });
});
</script>
<?php JsBlock::end(); ?>