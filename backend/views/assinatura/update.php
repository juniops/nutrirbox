<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Assinatura */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Assinatura',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Assinaturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="assinatura-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
