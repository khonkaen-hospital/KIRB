<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%irb_research_fund}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $status
 */
class ResearchFund extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%irb_research_fund}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ResearchFundQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ResearchFundQuery(get_called_class());
    }
}
