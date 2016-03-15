<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Clientes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Cliente',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'perfil',
            'nome',
            'email:email',
            'senha',
            // 'cpf',
            // 'sexo',
            // 'nascimento',
            // 'data_cadastro',
            // 'telefone',
            // 'celular',
            // 'ativo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
