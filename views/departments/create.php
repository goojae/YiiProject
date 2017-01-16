<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departments */

$this->title = 'เพิ่มแผนก';
$this->params['breadcrumbs'][] = ['label' => 'แผนก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-create">
    <div class="panel panel-info">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-pencil"></i> <?= Html::encode($this->title) ?></h4></div>
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
    <!--<h1><?= Html::encode($this->title) ?></h1>-->



    </div>
