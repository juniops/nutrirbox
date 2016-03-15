<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Prato */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Prato',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Pratos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prato-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'itens' => $itens,
    ]) ?>

</div>
