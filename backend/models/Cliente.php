<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property integer $perfil
 * @property string $nome
 * @property string $email
 * @property string $cpf
 * @property string $sexo
 * @property string $nascimento
 * @property string $data_cadastro
 * @property string $telefone
 * @property string $celular
 * @property integer $ativo
 *
 * @property Perfil $perfil0
 * @property Endereco[] $enderecos
 * @property Pedido[] $pedidos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perfil', 'email'], 'required'],
            [['perfil', 'ativo'], 'integer'],
            [['nascimento', 'data_cadastro'], 'safe'],
            [['nome', 'email'], 'string', 'max' => 100],
            [['cpf', 'telefone', 'celular'], 'string', 'max' => 15],
            [['sexo'], 'string', 'max' => 1],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'perfil' => Yii::t('app', 'Perfil'),
            'nome' => Yii::t('app', 'Nome'),
            'email' => Yii::t('app', 'Email'),
            'cpf' => Yii::t('app', 'Cpf'),
            'sexo' => Yii::t('app', 'Sexo'),
            'nascimento' => Yii::t('app', 'Nascimento'),
            'data_cadastro' => Yii::t('app', 'Data Cadastro'),
            'telefone' => Yii::t('app', 'Telefone'),
            'celular' => Yii::t('app', 'Celular'),
            'ativo' => Yii::t('app', 'Ativo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil0()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnderecos()
    {
        return $this->hasMany(Endereco::className(), ['cliente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['cliente' => 'id']);
    }
}
