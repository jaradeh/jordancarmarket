<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "colors".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $lang_id
 */
class Colors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'path'], 'required'],
            [['lang_id'], 'integer'],
            [['name', 'path'], 'string', 'max' => 255],
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
