<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $id
 * @property integer $cliente
 * @property integer $transacao
 * @property integer $assinatura
 * @property string $referencia
 * @property string $cadastro
 * @property integer $ativo
 *
 * @property Assinatura $assinatura0
 * @property Cliente $cliente0
 * @property Transacao $transacao0
 * @property Refeicao[] $refeicaos
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cliente', 'transacao', 'assinatura', 'referencia', 'cadastro'], 'required'],
            [['id', 'cliente', 'transacao', 'assinatura', 'ativo'], 'integer'],
            [['cadastro'], 'safe'],
            [['referencia'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Código'),
            'cliente' => Yii::t('app', 'Cliente'),
            'transacao' => Yii::t('app', 'Transação'),
            'assinatura' => Yii::t('app', 'Assinatura'),
            'referencia' => Yii::t('app', 'Referencia'),
            'cadastro' => Yii::t('app', 'Data de Cadastro'),
            'ativo' => Yii::t('app', 'Ativo?'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssinatura0()
    {
        return $this->hasOne(Assinatura::className(), ['id' => 'assinatura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente0()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransacao0()
    {
        return $this->hasOne(Transacao::className(), ['transacao' => 'transacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefeicaos()
    {
        return $this->hasMany(Refeicao::className(), ['pedido' => 'id']);
    }
}
