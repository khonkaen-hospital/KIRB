<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Research;

/**
 * ResearchSearch represents the model behind the search form about `common\models\Research`.
 */
class ResearchSearch extends Research
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'type_id', 'category_id', 'fund_id'], 'integer'],
            [['kecode', 'date_receive', 'no_receive', 'name_th', 'name_en', 'fund_description', 'detail', 'created_at', 'updated_at'], 'safe'],
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
        $query = Research::find()->byResearcher();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'type_id' => $this->type_id,
            'category_id' => $this->category_id,
            'fund_id' => $this->fund_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kecode', $this->kecode])
            ->andFilterWhere(['like', 'date_receive', $this->date_receive])
            ->andFilterWhere(['like', 'no_receive', $this->no_receive])
            ->andFilterWhere(['like', 'name_th', $this->name_th])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'fund_description', $this->fund_description])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
