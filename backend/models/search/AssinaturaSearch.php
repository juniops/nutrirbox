<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Assinatura;

/**
 * AssinaturaSearch represents the model behind the search form about `backend\models\Assinatura`.
 */
class AssinaturaSearch extends Assinatura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dias_semana', 'qtd_refeicao', 'qtd_suco_500', 'qtd_suco_300', 'qtd_sanduiche', 'qtd_acompanhamento', 'qtd_carne', 'qtd_dia'], 'integer'],
            [['data_cadastro'], 'safe'],
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
        $query = Assinatura::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'dias_semana' => $this->dias_semana,
            'qtd_refeicao' => $this->qtd_refeicao,
            'qtd_suco_500' => $this->qtd_suco_500,
            'qtd_suco_300' => $this->qtd_suco_300,
            'qtd_sanduiche' => $this->qtd_sanduiche,
            'qtd_acompanhamento' => $this->qtd_acompanhamento,
            'qtd_carne' => $this->qtd_carne,
            'qtd_dia' => $this->qtd_dia,
            'data_cadastro' => $this->data_cadastro,
        ]);

        return $dataProvider;
    }
}
