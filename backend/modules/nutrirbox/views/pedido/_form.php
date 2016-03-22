<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\nutrirbox\models\Pedido */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-3">
            <div class="box box-primary">
                <div class="box-body">
                    <?php echo $form->field($model, 'transacao')->textInput() ?>
                    <?php echo $form->field($model, 'referencia')->textInput(['maxlength' => true]) ?>
                    <?php echo $form->field($model, 'cadastro')->textInput() ?>
                    <?php echo $form->field($model, 'status')->textInput() ?>
                    <?php echo $form->field($model, 'data_entrega')->textInput() ?>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <?php echo $form->field($model, 'observacao')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
