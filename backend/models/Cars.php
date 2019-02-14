<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property integer $id
 * @property string $slug
 * @property string $name
 * @property string $title
 * @property integer $user_id
 * @property string $image
 * @property string $description
 * @property integer $make_id
 * @property integer $model_id
 * @property string $price
 * @property integer $year
 * @property string $milage
 * @property integer $condition_id
 * @property integer $exterior_color
 * @property integer $interior_color
 * @property integer $interior_type
 * @property integer $transmission
 * @property integer $engine
 * @property integer $drivetrain
 * @property string $inspection
 * @property integer $body_type
 * @property integer $featured
 * @property integer $status
 * @property integer $type
 * @property integer $location
 * @property integer $ad_type
 * @property integer $date_created
 * @property integer $date_edited
 * @property integer $lang_id
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'name', 'title', 'user_id', 'image', 'description', 'make_id', 'model_id', 'price', 'year', 'milage', 'condition_id', 'exterior_color', 'interior_color', 'interior_type', 'transmission', 'engine', 'drivetrain', 'inspection', 'body_type', 'featured', 'status', 'type', 'location', 'date_created', 'date_edited', 'lang_id'], 'required'],
            [['user_id', 'make_id', 'model_id', 'year', 'condition_id', 'exterior_color', 'interior_color', 'interior_type', 'transmission', 'engine', 'drivetrain', 'body_type', 'featured', 'status', 'type', 'location', 'ad_type', 'date_created', 'date_edited', 'lang_id'], 'integer'],
            [['description'], 'string'],
            [['slug', 'name', 'title', 'image', 'price', 'milage', 'inspection'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
            'title' => 'Title',
            'user_id' => 'User ID',
            'image' => 'Image',
            'description' => 'Description',
            'make_id' => 'Make ID',
            'model_id' => 'Model ID',
            'price' => 'Price',
            'year' => 'Year',
            'milage' => 'Milage',
            'condition_id' => 'Condition ID',
            'exterior_color' => 'Exterior Color',
            'interior_color' => 'Interior Color',
            'interior_type' => 'Interior Type',
            'transmission' => 'Transmission',
            'engine' => 'Engine',
            'drivetrain' => 'Drivetrain',
            'inspection' => 'Inspection',
            'body_type' => 'Body Type',
            'featured' => 'Featured',
            'status' => 'Status',
            'type' => 'Type',
            'location' => 'Location',
            'ad_type' => 'Ad Type',
            'date_created' => 'Date Created',
            'date_edited' => 'Date Edited',
            'lang_id' => 'Lang ID',
        ];
    }
    
    
    
    
    
    
    
    
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getMake() {
        return $this->hasOne(Make::className(), ['id' => 'make_id']);
    }

    public function beforeValidate() {
        if (parent::beforeValidate()) {
            $user_id = Yii::$app->user->getId();
            $this->user_id = $user_id;
            $this->price = preg_replace('/[^0-9]/', '', $this->price);
            $this->featured = 2;
            $this->status = 1;
            $this->ad_type = 1;
            $this->date_created = time();
            $this->date_edited = 0;
            $session = Yii::$app->session;
            $lang_id = $session['language_id'];
            $this->lang_id = $lang_id;
            $this->type = 1;
            $this->slug = $this->slugGenerator($this->name . "_" . Yii::$app->security->generateRandomString());
            return true;
        } else {
            return false;
        }
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
