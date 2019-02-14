<?php

namespace backend\models;

use Yii;
use backend\models\Cars;

/**
 * This is the model class for table "make".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property string $lang_id
 */
class Make extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'make';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'path'], 'required'],
            [['name', 'path'], 'string', 'max' => 255],
            [['path'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png ,jpg ,jpeg', 'maxFiles' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'path' => 'Make Logo',
            'lang_id' => 'Language',
        ];
    }

}
