<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\nutrirbox\models\Pedido */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Pedido',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
