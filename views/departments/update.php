<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departments */

$this->title = 'แก้ไขแผนก: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="departments-update">
    <div class="panel panel-info">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-edit"></i> <?= Html::encode($this->title) ?></h4></div>
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
                'ch' => $ch,
                'am' => $am,
            ])
            ?>
        </div>
    </div>

</div>
