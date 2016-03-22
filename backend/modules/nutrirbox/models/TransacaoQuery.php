<?php

namespace backend\modules\nutrirbox\models;

/**
 * This is the ActiveQuery class for [[Transacao]].
 *
 * @see Transacao
 */
class TransacaoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Transacao[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Transacao|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
