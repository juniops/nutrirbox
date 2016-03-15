<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prato".
 *
 * @property integer $id
 * @property integer $categoria
 * @property string $prato
 * @property double $valor
 * @property integer $qtd
 * @property string $descricao
 *
 * @property Categoria $categoria0
 * @property Refeicao[] $refeicaos
 */
class Prato extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prato';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria', 'prato', 'valor'], 'required'],
            [['categoria', 'qtd'], 'integer'],
            [['valor'], 'number'],
            [['descricao'], 'string'],
            [['prato'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria' => 'Categoria',
            'prato' => 'Prato',
            'valor' => 'Valor',
            'qtd' => 'Quantidade',
            'descricao' => 'Descrição',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria0()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefeicaos()
    {
        return $this->hasMany(Refeicao::className(), ['prato' => 'id']);
    }
}
