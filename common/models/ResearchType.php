<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%irb_research_type}}".
 *
 * @property integer $id
 * @property string $abbr
 * @property string $name
 * @property string $status
 */
class ResearchType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%irb_research_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['abbr'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'abbr' => Yii::t('app', 'Abbr'),
            'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ResearchTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ResearchTypeQuery(get_called_class());
    }
}
