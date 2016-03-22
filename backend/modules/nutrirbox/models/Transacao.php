<?php

namespace backend\modules\nutrirbox\models;

use Yii;

/**
 * This is the model class for table "transacao".
 *
 * @property integer $transacao
 * @property string $nome
 * @property integer $ativo
 * @property string $descricao
 *
 * @property Pedido[] $pedidos
 */
class Transacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['ativo'], 'integer'],
            [['descricao'], 'string'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transacao' => Yii::t('common', 'Transacao'),
            'nome' => Yii::t('common', 'Nome'),
            'ativo' => Yii::t('common', 'Ativo'),
            'descricao' => Yii::t('common', 'Descricao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['transacao' => 'transacao']);
    }

    /**
     * @inheritdoc
     * @return TransacaoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransacaoQuery(get_called_class());
    }
}
