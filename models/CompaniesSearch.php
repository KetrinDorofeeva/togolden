<?php
    namespace app\models;

    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use app\models\Companies;

    class CompaniesSearch extends Companies
    {
        public function rules()
        {
            return [
                [['id', 'id_user', 'inn'], 'integer'],
                [['name', 'general_information', 'general_manager', 'address', 'phone'], 'safe'],
            ];
        }

        public function scenarios()
        {
            return Model::scenarios();
        }

        public function search($params)
        {
            $query = Companies::find()->where(['id_user' => \Yii::$app->user->identity->id]);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id' => $this->id,
                'id_user' => $this->id_user,
                'inn' => $this->inn,
            ]);

            $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'general_information', $this->general_information])
                ->andFilterWhere(['like', 'general_manager', $this->general_manager])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->orderBy(['id' => SORT_DESC]);

            return $dataProvider;
        }
    }
?>