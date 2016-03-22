<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "refeicao".
 *
 * @property integer $id
 * @property integer $prato
 * @property integer $pedido
 * @property integer $recebido
 * @property string $data_entrega
 * @property integer $ativo
 * @property string $observacao
 *
 * @property Pedido $pedido0
 * @property Prato $prato0
 */
class Refeicao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refeicao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prato', 'pedido', 'data_entrega'], 'required'],
            [['prato', 'pedido', 'recebido', 'ativo'], 'integer'],
            [['data_entrega'], 'safe'],
            [['observacao'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prato' => 'Prato',
            'pedido' => 'Pedido',
            'recebido' => 'Recebido',
            'data_entrega' => 'Data Entrega',
            'ativo' => 'Ativo',
            'observacao' => 'Observacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido0()
    {
        return $this->hasOne(Pedido::className(), ['pedido' => 'pedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrato0()
    {
        return $this->hasOne(Prato::className(), ['id' => 'prato']);
    }
}
