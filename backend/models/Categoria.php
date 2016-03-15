<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property integer $id
 * @property string $categoria
 *
 * @property Prato[] $pratos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria'], 'required'],
            [['categoria'], 'string', 'max' => 45]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPratos()
    {
        return $this->hasMany(Prato::className(), ['categoria' => 'id']);
    }
}
