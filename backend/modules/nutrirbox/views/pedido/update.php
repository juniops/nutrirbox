<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\nutrirbox\models\Pedido */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Pedido',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="pedido-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
