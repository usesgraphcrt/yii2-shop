<?php
namespace pistol88\shop\models;

use Yii;
use yii\helpers\Url;
use yii\db\ActiveQuery;

class StockToUser extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return '{{%shop_stock_to_user}}';
    }
    
    public function rules()
    {
        return [
            [['user_id', 'stock_id'], 'required'],
            [['user_id', 'stock_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Адрес',
            'name' => 'Название',
            'text' => 'Текст',
        ];
    }
}
