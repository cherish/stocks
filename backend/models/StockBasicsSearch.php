<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StockBasics;

/**
 * StockBasicsSearch represents the model behind the search form of `common\models\StockBasics`.
 */
class StockBasicsSearch extends StockBasics
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'industry', 'area'], 'safe'],
            [['pe', 'outstanding', 'totals', 'totalAssets', 'liquidAssets', 'fixedAssets', 'reserved', 'reservedPerShare', 'esp', 'bvps', 'pb', 'undp', 'perundp', 'rev', 'profit', 'gpr', 'npr', 'holders'], 'number'],
            [['timeToMarket'], 'integer'],
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
        $query = StockBasics::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pe' => $this->pe,
            'outstanding' => $this->outstanding,
            'totals' => $this->totals,
            'totalAssets' => $this->totalAssets,
            'liquidAssets' => $this->liquidAssets,
            'fixedAssets' => $this->fixedAssets,
            'reserved' => $this->reserved,
            'reservedPerShare' => $this->reservedPerShare,
            'esp' => $this->esp,
            'bvps' => $this->bvps,
            'pb' => $this->pb,
            'timeToMarket' => $this->timeToMarket,
            'undp' => $this->undp,
            'perundp' => $this->perundp,
            'rev' => $this->rev,
            'profit' => $this->profit,
            'gpr' => $this->gpr,
            'npr' => $this->npr,
            'holders' => $this->holders,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'industry', $this->industry])
            ->andFilterWhere(['like', 'area', $this->area]);

        return $dataProvider;
    }
}
