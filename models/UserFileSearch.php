<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EzFilepath;

/**
 * UserFileSearch represents the model behind the search form about `app\models\EzFilepath`.
 * @author duncan <[duncan@mail.npust.edu.tw]>
 */
class UserFileSearch extends EzFilepath
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid'], 'integer'],
            [['filename', 'uploaddate'], 'safe'],
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
        $query = EzFilepath::find();

        $this->load($params);

        $query->where(['userid'=>Yii::$app->user->id]);

        $query->andFilterWhere([
            'id' => $this->id,
            'uploaddate' => $this->uploaddate,
        ]);

        $query->andFilterWhere(['like', 'filename', $this->filename]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $dataProvider;
    }
}
