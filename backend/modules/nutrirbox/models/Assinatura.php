<?php

namespace backend\modules\nutrirbox\models;

use Yii;

/**
 * This is the model class for table "assinatura".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $dias_semana
 * @property integer $qtd_suco_500
 * @property integer $qtd_suco_300
 * @property integer $qtd_sanduiche
 * @property integer $qtd_acompanhamento
 * @property integer $qtd_salada
 * @property integer $qtd_carne
 * @property integer $qtd_dia
 * @property string $data_cadastro
 * @property string $observacao
 *
 * @property User $user
 * @property Pedido[] $pedidos
 */
class Assinatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assinatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'dias_semana'], 'required'],
            [['user_id', 'qtd_suco_500', 'qtd_suco_300', 'qtd_sanduiche', 'qtd_acompanhamento', 'qtd_salada', 'qtd_carne', 'qtd_dia'], 'integer'],
            [['dias_semana'], 'string', 'max' => 20],
            [['data_cadastro'], 'safe'],
            [['observacao'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'user_id' => Yii::t('backend', 'Usuário'),
            'dias_semana' => Yii::t('backend', 'Dias da Semana'),
            'qtd_suco_500' => Yii::t('backend', 'Quantidade de suco(s) 500ml'),
            'qtd_suco_300' => Yii::t('backend', 'Quantidade de suco(s) 300ml'),
            'qtd_sanduiche' => Yii::t('backend', 'Quantidade de sanduiche(s)'),
            'qtd_acompanhamento' => Yii::t('backend', 'Quantidade de acompanhamento(s)'),
            'qtd_salada' => Yii::t('backend', 'Quantidade de salada(s)'),
            'qtd_carne' => Yii::t('backend', 'Quantidade de carne(s)'),
            'qtd_dia' => Yii::t('backend', 'Quantidade de dia(s)'),
            'data_cadastro' => Yii::t('backend', 'Data Cadastro'),
            'observacao' => Yii::t('backend', 'Observação'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['assinatura_id' => 'id']);
    }

    public function calcularAssinatura()
    {
        $this->resetQuantidades();
        $desconto = ($this->qtd_dia >= 20 ? 25 : 15);

        $valorPrato = $this->getValorPrato();
        $valor = $this->qtd_dia * $valorPrato;
        $valor = $valor - ($valor * $desconto) / 100;
        return round($valor);
    }

    public function resetQuantidades()
    {
        $this->qtd_suco_500 = (empty($this->qtd_suco_500) ? 0 : $this->qtd_suco_500);
        $this->qtd_suco_300 = (empty($this->qtd_suco_300) ? 0 : $this->qtd_suco_300);
        $this->qtd_sanduiche = (empty($this->qtd_sanduiche) ? 0 : $this->qtd_sanduiche);
        $this->qtd_acompanhamento = (empty($this->qtd_acompanhamento) ? 0 : $this->qtd_acompanhamento);
        $this->qtd_salada = (empty($this->qtd_salada) ? 0 : $this->qtd_salada);
        $this->qtd_carne = (empty($this->qtd_carne) ? 0 : $this->qtd_carne);
        $this->qtd_dia = (empty($this->qtd_dia) ? 0 : $this->qtd_dia);
    }

    public function getValorPrato(){
        $valorPrato = $this->qtd_carne * 9.5 +
            $this->qtd_acompanhamento * 2 +
            $this->qtd_salada * 2.5 +
            $this->qtd_sanduiche * 10.69 +
            $this->qtd_suco_300 * 4 +
            $this->qtd_suco_500 * 5.5;
        return round($valorPrato);
    }
}