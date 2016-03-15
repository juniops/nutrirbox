<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assinatura".
 *
 * @property integer $id
 * @property integer $dias_semana
 * @property integer $qtd_refeicao
 * @property integer $qtd_suco_500
 * @property integer $qtd_suco_300
 * @property integer $qtd_sanduiche
 * @property integer $qtd_acompanhamento
 * @property integer $qtd_carne
 * @property integer $qtd_dia
 * @property string $data_cadastro
 *
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
            [['dias_semana', 'qtd_refeicao', 'qtd_suco_500', 'qtd_suco_300', 'qtd_sanduiche', 'qtd_acompanhamento', 'qtd_carne', 'qtd_dia'], 'required'],
            [['dias_semana', 'qtd_refeicao', 'qtd_suco_500', 'qtd_suco_300', 'qtd_sanduiche', 'qtd_acompanhamento', 'qtd_carne', 'qtd_dia'], 'integer'],
            [['data_cadastro'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dias_semana' => 'Dias Semana',
            'qtd_refeicao' => 'Qtd Refeicao',
            'qtd_suco_500' => 'Qtd Suco 500',
            'qtd_suco_300' => 'Qtd Suco 300',
            'qtd_sanduiche' => 'Qtd Sanduiche',
            'qtd_acompanhamento' => 'Qtd Acompanhamento',
            'qtd_carne' => 'Qtd Carne',
            'qtd_dia' => 'Qtd Dia',
            'data_cadastro' => 'Data Cadastro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['assinatura' => 'id']);
    }
}
