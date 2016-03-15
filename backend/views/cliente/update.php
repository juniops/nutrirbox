<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cliente */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Cliente',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="cliente-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
