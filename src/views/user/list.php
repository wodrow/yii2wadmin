<?php
/**
 * @var \yii\web\View $this
 */

\fedemotta\datatables\DataTablesAsset::register($this);

$this->title = "列表";
?>

<div class="">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Name</th>
            </tr>
        </tfoot>
    </table>
</div>