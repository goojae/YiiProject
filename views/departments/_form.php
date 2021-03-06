<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'group_id')->dropDownList(//เซ็ตค่า
            \yii\helpers\ArrayHelper::map(app\models\Groups::find()->all(), 'id', 'name'), [
        'prompt' => '--ระบุกลุ่มงาน--']
    )
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-save"></i> บันทึก' : '<i class="glyphicon glyphicon-save"></i> แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
