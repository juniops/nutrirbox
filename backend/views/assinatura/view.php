<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Assinatura */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Assinaturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assinatura-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'dias_semana',
            'qtd_refeicao',
            'qtd_suco_500',
            'qtd_suco_300',
            'qtd_sanduiche',
            'qtd_acompanhamento',
            'qtd_carne',
            'qtd_dia',
            'data_cadastro',
        ],
    ]) ?>

</div>
