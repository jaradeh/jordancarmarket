<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cars_images".
 *
 * @property integer $id
 * @property integer $car_id
 * @property string $images
 */
class CarsImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'images'], 'required'],
            [['car_id'], 'integer'],
            [['images'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'images' => 'Image',
        ];
    }
}
