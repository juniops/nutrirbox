<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "endereco".
 *
 * @property integer $id
 * @property integer $pessoa
 * @property string $logradouro
 * @property string $numero
 * @property string $bairro
 * @property string $cep
 * @property string $cidade
 * @property integer $ativo
 *
 * @property Pessoa $pessoa0
 */
class Endereco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'endereco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa', 'logradouro'], 'required'],
            [['pessoa', 'ativo'], 'integer'],
            [['logradouro'], 'string', 'max' => 150],
            [['numero', 'cep'], 'string', 'max' => 45],
            [['bairro'], 'string', 'max' => 50],
            [['cidade'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pessoa' => 'Pessoa',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'bairro' => 'Bairro',
            'cep' => 'Cep',
            'cidade' => 'Cidade',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa0()
    {
        return $this->hasOne(Pessoa::className(), ['id' => 'pessoa']);
    }
}
