<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Assinatura */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="assinatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'dias_semana')->textInput() ?>

    <?php echo $form->field($model, 'qtd_refeicao')->textInput() ?>

    <?php echo $form->field($model, 'qtd_suco_500')->textInput() ?>

    <?php echo $form->field($model, 'qtd_suco_300')->textInput() ?>

    <?php echo $form->field($model, 'qtd_sanduiche')->textInput() ?>

    <?php echo $form->field($model, 'qtd_acompanhamento')->textInput() ?>

    <?php echo $form->field($model, 'qtd_carne')->textInput() ?>

    <?php echo $form->field($model, 'qtd_dia')->textInput() ?>

    <?php echo $form->field($model, 'data_cadastro')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
