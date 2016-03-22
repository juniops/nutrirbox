<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Prato */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="prato-form">

    <?php $form = ActiveForm::begin([
        'enableClientScript' => false,
    ]); ?>

<!--    --><?php //echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'categoria')->dropDownList($itens) ?>

    <?php echo $form->field($model, 'prato')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'valor')->textInput(array('class'=>'form-control moeda')) ?>

    <?php echo $form->field($model, 'qtd')->textInput() ?>

    <?php echo $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
