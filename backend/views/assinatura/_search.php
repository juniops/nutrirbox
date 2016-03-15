<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AssinaturaSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="assinatura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'dias_semana') ?>

    <?php echo $form->field($model, 'qtd_refeicao') ?>

    <?php echo $form->field($model, 'qtd_suco_500') ?>

    <?php echo $form->field($model, 'qtd_suco_300') ?>

    <?php // echo $form->field($model, 'qtd_sanduiche') ?>

    <?php // echo $form->field($model, 'qtd_acompanhamento') ?>

    <?php // echo $form->field($model, 'qtd_carne') ?>

    <?php // echo $form->field($model, 'qtd_dia') ?>

    <?php // echo $form->field($model, 'data_cadastro') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
