<?php

namespace backend\modules\nutrirbox\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $id
 * @property integer $assinatura_id
 * @property integer $transacao
 * @property string $referencia
 * @property string $cadastro
 * @property integer $status
 * @property string $data_entrega
 * @property string $observacao
 *
 * @property Assinatura $assinatura
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
            [['id', 'assinatura_id', 'transacao', 'referencia', 'cadastro', 'data_entrega'], 'required'],
            [['id', 'assinatura_id', 'transacao', 'status'], 'integer'],
            [['cadastro', 'data_entrega'], 'safe'],
            [['observacao'], 'string'],
            [['referencia'], 'string', 'max' => 45],
            [['assinatura_id'], 'exist', 'skipOnError' => true, 'targetClass' => Assinatura::className(), 'targetAttribute' => ['assinatura_id' => 'id']],
            [['transacao'], 'exist', 'skipOnError' => true, 'targetClass' => Transacao::className(), 'targetAttribute' => ['transacao' => 'transacao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'Código'),
            'assinatura_id' => Yii::t('common', 'Assinatura ID'),
            'transacao' => Yii::t('common', 'Transação'),
            'referencia' => Yii::t('common', 'Referencia'),
            'cadastro' => Yii::t('common', 'Data de Cadastro'),
            'status' => Yii::t('common', 'Ativo?'),
            'data_entrega' => Yii::t('common', 'Data Entrega'),
            'observacao' => Yii::t('common', 'Observacao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssinatura()
    {
        return $this->hasOne(Assinatura::className(), ['id' => 'assinatura_id']);
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

    /**
     * @inheritdoc
     * @return PedidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PedidoQuery(get_called_class());
    }
}
