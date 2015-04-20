<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EzFilepath;

/**
 * AdminFileSearch represents the model behind the search form about `app\models\EzFilepath`.
 * @author duncan <[duncan@mail.npust.edu.tw]>
 *
 */
class AdminFileSearch extends EzFilepath
{
    public $name ;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid'], 'integer'],
            [['filename', 'uploaddate','name'], 'safe'],
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
        $query = EzFilepath::find()->joinWith(['ezuser']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['name'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['ez_user.username' => SORT_ASC],
            'desc' => ['ez_user.username' => SORT_DESC],
        ];  

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'userid' => $this->userid,
            'uploaddate' => $this->uploaddate,
        ]);

        $query->andFilterWhere(['like', 'filename', $this->filename]);

        $query->andFilterWhere(['like', 'ez_user.username', $this->name]);

        return $dataProvider;
    }
}
