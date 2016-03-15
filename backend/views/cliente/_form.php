<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cliente */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'perfil')->textInput() ?>

    <?php echo $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'senha')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'cpf')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'sexo')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'nascimento')->textInput() ?>

    <?php echo $form->field($model, 'data_cadastro')->textInput() ?>

    <?php echo $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'ativo')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
