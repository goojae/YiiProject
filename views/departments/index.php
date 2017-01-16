<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แผนก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มแผนก', ['create'], ['class' => 'btn btn-info']) ?>
    </p>
    <div class="panel panel-info">
        <div class="panel-heading"><?= Html::encode($this->title) ?></div>
        <div class="panel-body">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    'name',
                    //'group_id',
                    //'depgroup.name',
                    [
                        'attribute' => 'group_id',
                        'value' => 'depgroup.name'
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>  
        </div>
    </div>

</div>
