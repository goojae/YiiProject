<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ลูกค้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'addr',
            [
                'attribute'=>'t',
                'value'=>$model->custmb->name
            ],
            [
                'attribute'=>'a',
                'value'=>$model->cusamp->name
            ],
            [
                'attribute'=>'c',
                'value'=>$model->cuschw->name
            ], 
            'birthday',
            'cid',
            'p',
            'tel',
            'work',
            'department_id',
            
            [
                'attribute'=>'group_id',
                'value'=>$model->cusdep->depgroup->name
            ],
            'position_id',
            'interest',
            'avatar',
            'fb',
            'line',
            'email:email',
            'createdate',
            'updatedate',
        ],
    ]) ?>

</div>
