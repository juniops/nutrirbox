<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriaBusca */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Criar Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
