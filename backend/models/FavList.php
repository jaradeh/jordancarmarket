<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fav_list".
 *
 * @property integer $id
 * @property integer $listing_id
 * @property integer $user_id
 * @property integer $status
 * @property integer $date_added
 */
class FavList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fav_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['listing_id', 'user_id', 'date_added'], 'required'],
            [['listing_id', 'user_id', 'status', 'date_added'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'listing_id' => 'Listing ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'date_added' => 'Date Added',
        ];
    }
}
