<?php

namespace backend\modules\nutrirbox\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\nutrirbox\models\Prato;

/**
 * PratoSearch represents the model behind the search form about `backend\models\Prato`.
 */
class PratoSearch extends Prato
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'categoria', 'qtd'], 'integer'],
            [['prato', 'descricao'], 'safe'],
            [['valor'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Prato::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'categoria' => $this->categoria,
            'valor' => $this->valor,
            'qtd' => $this->qtd,
        ]);

        $query->andFilterWhere(['like', 'prato', $this->prato])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
