<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cliente */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cliente-form">
    <?php $form = ActiveForm::begin(); ?>
<!--    --><?php //echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">Cliente</h3>
                </div>
                <div class="box-body">
                    <?php echo $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
                    <?php echo $form->field($model, 'nascimento')->textInput(['class'=>'form-control data']) ?>
                    <?php echo $form->field($model, 'sexo')->radioList([1=>'Masculino',2=>'Feminino']) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-phone"></i>
                    <h3 class="box-title">Contato</h3>
                </div>
                <div class="box-body">
                    <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    <?php echo $form->field($model, 'telefone')->textInput(['maxlength' => true, 'class'=>'form-control telefone']) ?>
                    <?php echo $form->field($model, 'celular')->textInput(['maxlength' => true, 'class'=>'form-control telefone']) ?>
                    <?php echo $form->field($model, 'ativo')->checkbox() ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
