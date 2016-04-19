<?php use kartik\money\MaskMoney; ?>

<div class="row well">
    <div class="col-lg-12">

        <ul class="spaced3">
            <li>
                <?php echo sprintf('%02d', $model->qtd_carne); ?> Carne
            </li>
            <li>
                <?php echo sprintf('%02d', $model->qtd_acompanhamento); ?> Acompanhamentos
            </li>
            <li>
                <?php echo sprintf('%02d', $model->qtd_salada); ?> Salada
            </li>
            <li>
                <?php echo sprintf('%02d', $model->qtd_sanduiche); ?> Sanduíches
            </li>
            <li>
                <?php echo sprintf('%02d', $model->qtd_suco_500); ?> Sucos de 500ml
            </li>
            <li>
                <?php echo sprintf('%02d', $model->qtd_suco_300); ?> Sucos de 300ml
            </li>
        </ul>
        <br>
        <ul class="list-unstyled spaced2">
            <li class="text-success bigger-110">
                <i class="ace-icon fa fa-calendar"></i>
                <b>Valor por dia:</b>
                <?php
                echo MaskMoney::widget([
                    'name' => 'currency',
                    'value' => $valorPorDia,
                    'disabled' => true
                ]);
                ?>
            </li>
            <br>
            <li class="text-info bigger-110">
                <i class="ace-icon fa fa-money"></i>
                <b>Valor Total da Assinatura:</b>
                <?php
                echo MaskMoney::widget([
                    'name' => 'currency',
                    'value' => $valor,
                    'disabled' => true
                ]);
                ?>
            </li>
            <br>
            <li class="text-info bigger-110">
                <i class="ace-icon fa fa-money"></i>
                <b>Valor Total da Assinatura com frete:</b>
                <?php
                echo MaskMoney::widget([
                    'name' => 'currency',
                    'value' => $valor + ($model->qtd_dia * 3),
                    'disabled' => true
                ]);
                ?>
            </li>
        </ul>
    </div>
</div>