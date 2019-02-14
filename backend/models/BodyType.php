<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "body_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $lang_id
 */
class BodyType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'body_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'path', 'lang_id'], 'required'],
            [['path'], 'string'],
            [['lang_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'path' => 'Path',
            'lang_id' => 'Lang ID',
        ];
    }
}
