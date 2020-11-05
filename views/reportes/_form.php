<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reportes */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="reportes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reportador_id')->textInput() ?>

    <?= $form->field($model, 'reportado_id')->textInput() ?>

    <?= $form->field($model, 'razon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
