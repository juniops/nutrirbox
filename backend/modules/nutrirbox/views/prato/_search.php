<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PratoSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="prato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'categoria') ?>

    <?php echo $form->field($model, 'prato') ?>

    <?php echo $form->field($model, 'valor') ?>

    <?php echo $form->field($model, 'qtd') ?>

    <?php // echo $form->field($model, 'descricao') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
