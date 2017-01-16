<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = 'เพิ่มลูกค้า';
$this->params['breadcrumbs'][] = ['label' => 'ลูกค้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-create">
<div class="departments-create">
    <div class="panel panel-info">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-pencil"></i> <?= Html::encode($this->title) ?></h4></div>
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
                'ch' => [],
                'am' => []
            ])
            ?>
        </div>
    </div>

</div>
