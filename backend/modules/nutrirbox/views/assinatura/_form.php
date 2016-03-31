<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Assinatura */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="assinatura-form">

    <?php $form = ActiveForm::begin(['id'=>'assinatura-form']); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-lg-3">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="well">
                        <?php echo $form->field($model, 'qtd_carne')->textInput(['class' => 'form-control numero', 'maxlength' => 3]) ?>
                        <?php echo $form->field($model, 'qtd_acompanhamento')->textInput(['class' => 'form-control numero', 'maxlength' => 3]) ?>
                        <?php echo $form->field($model, 'qtd_salada')->textInput(['class' => 'form-control numero', 'maxlength' => 3]) ?>
                        <?php echo $form->field($model, 'qtd_sanduiche')->textInput(['class' => 'form-control numero', 'maxlength' => 3]) ?>
                        <?php echo $form->field($model, 'qtd_suco_500')->textInput(['class' => 'form-control numero', 'maxlength' => 3]) ?>
                        <?php echo $form->field($model, 'qtd_suco_300')->textInput(['class' => 'form-control numero', 'maxlength' => 3]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="box box-primary">
                <div class="box-body">
                    <?php echo $form->field($model, 'qtd_dia')->textInput(['class' => 'form-control numero', 'maxlength' => 3]) ?>
                    <?php echo $form->field($model, 'dias_semana')->inline(true)->checkboxList([2=>'segunda',3=>'terça',4=>'quarta',5=>'quinta',6=>'sexta'],['class' => 'form-control numero', 'maxlength' => 3]) ?>
                    <?php echo $form->field($model, 'observacao')->textarea(['rows' => 6]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-calculator"></i>

                    <h3 class="box-title">Valores Calculados</h3>

                    <div class="box-body">
                        <div class="valoresCalculados">

                        </div>
                        <?php
                        echo Html::a('<i class="fa fa-calculator"></i> Calcular Assinatura', ['assinatura/calcular'], [
                                'class'=>'btn btn-info',
                                'id' => 'calcularAssinatura',
                                'data-on-done' => 'calcularAssinatura',
                                'data-form-id' => 'assinatura-form',
                            ]
                        );
                        ?>
                        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php $this->registerJs(" $('#calcularAssinatura').click(handleAjaxLink); ", \yii\web\View::POS_READY); ?>
