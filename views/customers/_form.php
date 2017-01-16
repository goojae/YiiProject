<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <?= $form->field($model, 'addr')->textarea(['row' => 3]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?=
            $form->field($model, 'c')->widget(\kartik\widgets\Select2::className(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Chw::find()->all(), 'id', 'name'),
                'options' => [
                    'placeholder' => '<--ระบุจังหวัด-->'
                ],
                'pluginOptions' => [
                    'allowClear' => TRUE
                ]
            ])
            ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <?= $form->field($model, 'a')->widget(\kartik\widgets\DepDrop::className(), [
                'data'=>[$ch],
                'options' => [
                    'placeholder' => '<--ระบุอำเภอ-->',
                    'type'=>  \kartik\widgets\DepDrop::TYPE_SELECT2,
                    'select2Options'=>[
                        'pluginOptions' => ['allowClear' => TRUE],
                        'pluginOptions' => [
                            'depends'=>['customer-c'],
                            'url'=>  \yii\helpers\Url::to(['/customer/get-ch']),
                            'loadingText'=>'Loading...'
                        ]
                    ]
                ]
            ])
            ?>
        </div>
        <div class="col-xs-3 col-sm-4 col-md-3">
             <?= $form->field($model, 't')->widget(\kartik\widgets\DepDrop::className(), [
                'data'=>[$am],
                'options' => [
                    'placeholder' => '<--ระบุตำบล-->',
                    'type'=>  \kartik\widgets\DepDrop::TYPE_SELECT2,
                    'select2Options'=>[
                        'pluginOptions' => ['allowClear' => TRUE],
                        'pluginOptions' => [
                            'depends'=>['customer-c','customer-a'],
                            'url'=>  \yii\helpers\Url::to(['/customer/get-am']),
                            'loadingText'=>'Loading...'
                        ]
                    ]
                ]
            ])
            ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
<?= $form->field($model, 'p')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?=
            $form->field($model, 'cid')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9-9999-99999-99-9'
            ])
            ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?=
            $form->field($model, 'birthday')->widget(\yii\jui\DatePicker::classname(), [
                'language' => 'th',
                'dateFormat' => 'yyyy-MM-dd',
                'clientOptions' => [
                    'changeMonth' => true,
                    'changeYear' => true,
                ],
                'options' => ['class' => 'form-control']
            ])
            ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
<?=
$form->field($model, 'tel')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '99-9999-999-9'
])
?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?=
            $form->field($model, 'group_id')->widget(\kartik\widgets\Select2::className(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Groups::find()->all(), 'id', 'name'),
                'options' => [
                    'placeholder' => '<--ระบุกลุ่มงาน-->'
                ],
                'pluginOptions' => [
                    'allowClear' => TRUE
                ]
            ])
            ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'department_id')->textInput() ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?=
            $form->field($model, 'position_id')->widget(\kartik\widgets\Select2::className(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Positions::find()->all(), 'id', 'name'),
                'options' => [
                    'placeholder' => '<--ระบุตำแหน่ง-->'
                ],
                'pluginOptions' => [
                    'allowClear' => TRUE
                ]
            ])
            ?>
        </div>

    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'work')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <?= $form->field($model, 'interest')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'fb')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
<?= $form->field($model, 'line')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
<?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-save"></i> บันทึก' : '<i class="glyphicon glyphicon-save"></i> แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
