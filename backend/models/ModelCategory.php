<?php

namespace backend\models;

use Yii;
use backend\models\Model;

/**
 * This is the model class for table "model_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $make_id
 */
class ModelCategory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'model_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'make_id'], 'required'],
            [['make_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'make_id' => 'Make ID',
        ];
    }

     

}
