<?php

namespace backend\models;

use Yii;
use backend\models\Cars;

/**
 * This is the model class for table "car_features".
 *
 * @property integer $id
 * @property integer $car_id
 * @property integer $cat_id
 */
class CarFeatures extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'car_features';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['car_id', 'cat_id'], 'required'],
            [['car_id', 'cat_id'], 'integer'],
        ];
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'cat_id' => 'Cat ID',
        ];
    }

}
