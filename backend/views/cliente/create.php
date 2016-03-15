<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cliente */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Cliente',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
