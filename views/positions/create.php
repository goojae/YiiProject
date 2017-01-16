<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Positions */

$this->title = 'เพิ่มตำแหน่ง';
$this->params['breadcrumbs'][] = ['label' => 'ตำแหน่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
