<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Categoria */

$this->title = 'Criar Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
