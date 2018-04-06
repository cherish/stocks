<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TickData;

/**
 * TickDataSearch represents the model behind the search form of `common\models\TickData`.
 */
class TickDataSearch extends TickData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['index'], 'integer'],
            [['date', 'code'], 'safe'],
            [['open', 'close', 'high', 'low', 'volume'], 'number'],
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
        $query = TickData::find();

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
        
        if(isset($params['code'])&&!empty($params['code'])){
            $this->code = $params['code'];
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'index' => $this->index,
            'open' => $this->open,
            'close' => $this->close,
            'high' => $this->high,
            'low' => $this->low,
            'volume' => $this->volume,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
