<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-user"></i>

                    <h3 class="box-title">Usuário</h3>

                    <div class="box-body">
                        <?php echo $form->field($model, 'username') ?>
                        <?php echo $form->field($model, 'email') ?>
                        <?php echo $form->field($model, 'password')->passwordInput() ?>
                        <?php echo $form->field($model, 'date_of_birth')->textInput() ?>
                        <?php echo $form->field($model, 'status')->dropDownList(User::statuses()) ?>
                        <?php echo $form->field($model, 'roles')->checkboxList($roles) ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-phone"></i>
                    <h3 class="box-title">Contato</h3>
                    <div class="box-body">
                        <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                        <?php echo $form->field($model, 'cell_phone')->textInput(['maxlength' => true]) ?>
                        <?php echo $form->field($model, 'cep')->textInput(['maxlength' => true]) ?>
                        <?php echo $form->field($model, 'uf')->textInput(['maxlength' => true]) ?>
                        <?php echo $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                        <?php echo $form->field($model, 'neighborhood')->textInput(['maxlength' => true]) ?>
                        <?php echo $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
