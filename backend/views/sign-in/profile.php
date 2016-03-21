<?php

use common\models\UserProfile;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = Yii::t('backend', 'Edit profile')
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-user"></i>

                    <h3 class="box-title">Informações</h3>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <?php echo $form->field($model, 'picture')->widget(\trntv\filekit\widget\Upload::classname(), [
                                    'url' => ['avatar-upload']
                                ]) ?>
                            </div>
                            <div class="col-lg-8">
                                <?php echo $form->field($model, 'firstname')->textInput(['maxlength' => 255]) ?>
                                <?php echo $form->field($model, 'middlename')->textInput(['maxlength' => 255]) ?>
                                <?php echo $form->field($model, 'lastname')->textInput(['maxlength' => 255]) ?>
                            </div>
                        </div>
                        <?php echo $form->field($model, 'date_of_birth')->textInput(['class'=>'form-control data','start-date'=>'-30y']) ?>
                        <?php echo $form->field($model, 'gender')->dropDownlist([
                            UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female'),
                            UserProfile::GENDER_MALE => Yii::t('backend', 'Male')
                        ]) ?>
                        <?php echo $form->field($model, 'locale')->dropDownlist(Yii::$app->params['availableLocales']) ?>
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
                        <?php echo $form->field($model, 'phone')->textInput(['maxlength' => true, 'class'=>'form-control telefone']) ?>
                        <?php echo $form->field($model, 'cell_phone')->textInput(['maxlength' => true, 'class'=>'form-control telefone']) ?>
                        <?php echo $form->field($model, 'cep')->textInput(['maxlength' => true, 'class'=>'form-control cep']) ?>
                        <?php echo $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                        <?php echo $form->field($model, 'neighborhood')->textInput(['maxlength' => true]) ?>
                        <?php echo $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
