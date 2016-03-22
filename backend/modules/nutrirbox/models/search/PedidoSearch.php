<?php

namespace backend\modules\nutrirbox\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\nutrirbox\models\Pedido;

/**
 * PedidoSearch represents the model behind the search form about `backend\modules\nutrirbox\models\Pedido`.
 */
class PedidoSearch extends Pedido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'assinatura_id', 'transacao', 'status'], 'integer'],
            [['referencia', 'cadastro', 'data_entrega', 'observacao'], 'safe'],
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
        $query = Pedido::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'assinatura_id' => $this->assinatura_id,
            'transacao' => $this->transacao,
            'cadastro' => $this->cadastro,
            'status' => $this->status,
            'data_entrega' => $this->data_entrega,
        ]);

        $query->andFilterWhere(['like', 'referencia', $this->referencia])
            ->andFilterWhere(['like', 'observacao', $this->observacao]);

        return $dataProvider;
    }
}
