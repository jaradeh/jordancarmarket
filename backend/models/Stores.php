<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stores".
 *
 * @property integer $id
 * @property integer $slug
 * @property integer $user_id
 * @property integer $created_user_id
 * @property string $name
 * @property integer $location
 * @property string $path
 * @property string $status
 * @property integer $date_created
 * @property integer $date_updated
 */
class Stores extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'stores';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'name'], 'required'],
            [['user_id', 'status', 'created_user_id', 'location', 'date_created', 'date_updated'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['path', 'slug'], 'string', 'max' => 255],
            ['slug', 'unique', 'targetClass' => '\backend\models\Stores', 'message' => 'This slug has already been taken.'],
            [['path'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png ,jpg ,jpeg', 'maxFiles' => 1],
        ];
    }

    public function beforeValidate() {
        if (parent::beforeValidate()) {

            $this->slug = $this->slugGenerator($this->name . "_" . Yii::$app->security->generateRandomString());
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'user_id' => 'Store Onwer',
            'created_user_id' => 'Created User ID',
            'name' => 'Store Name',
            'location' => 'Store Location',
            'path' => 'Store Logo',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->slug = $this->slugGenerator($this->slug);
//                $this->created_at = time();
            } else {
                $this->slug = $this->slugGenerator($this->slug);
//                $this->updated_at = time();
            }
            return true;
        } else {
            return false;
        }
    }

    static public function slugGenerator($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '_', $text);

        // transliterate
        $text = iconv('UTF-8', 'UTF-16BE', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '_', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return '';
        }

        return $text;
    }

}
