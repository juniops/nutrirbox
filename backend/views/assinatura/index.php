<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AssinaturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Assinaturas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assinatura-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Assinatura',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dias_semana',
            'qtd_refeicao',
            'qtd_suco_500',
            'qtd_suco_300',
            // 'qtd_sanduiche',
            // 'qtd_acompanhamento',
            // 'qtd_carne',
            // 'qtd_dia',
            // 'data_cadastro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
