<?php

namespace backend \models;

use Yii;

/**
 * This is the model class for table "tempat".
 *
 * @property integer $id
 * @property string $nama_tempat
 * @property string $mlat
 * @property string $mlong
 * @property string $gambar
 * @property string $deskripsi
 */
class Tempat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tempat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_tempat', 'mlat', 'mlong', 'gambar', 'deskripsi'], 'required'],
            [['deskripsi'], 'string'],
            [['nama_tempat'], 'string', 'max' => 50],
            [['mlat', 'mlong', 'gambar'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_tempat' => 'Nama Tempat',
            'mlat' => 'Mlat',
            'mlong' => 'Mlong',
            'gambar' => 'Gambar',
            'deskripsi' => 'Deskripsi',
        ];
    }
    public function search($params)
    {
        $query = Tempat::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'nama_tempat', $this->nama_tempat])
            ->andFilterWhere(['like', 'mlat', $this->mlat])
            ->andFilterWhere(['like', 'mlong', $this->mlong])
            ->andFilterWhere(['like', 'gambar', $this->gambar])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
