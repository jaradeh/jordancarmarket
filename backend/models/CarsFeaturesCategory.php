<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cars_features_category".
 *
 * @property integer $id
 * @property string $cat_id
 * @property string $name
 * @property string $lang_id
 */
class CarsFeaturesCategory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'cars_features_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cat_id', 'name', 'lang_id'], 'required'],
            [['id', 'cat_id', 'lang_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cat_id' => 'Category ID',
            'name' => 'Name',
            'lang_id' => 'Language',
        ];
    }

}
