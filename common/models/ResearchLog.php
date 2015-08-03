<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "{{%research_log}}".
 *
 * @property integer $id
 * @property integer $research_id
 * @property integer $created_at
 * @property integer $created_by
 * @property string $message
 * @property integer $type
 * @property text $data
 */
class ResearchLog extends \yii\db\ActiveRecord
{

  public function behaviors(){
              return [
                  [
                      'class' => BlameableBehavior::className(),
                      'createdByAttribute'=>'created_by',
                      'updatedByAttribute' => 'created_by',
                  ],
                  [
                      'class' => TimestampBehavior::className(),
                      'createdAtAttribute' => 'created_at',
                      'updatedAtAttribute' => 'created_at'
                  ],
              ];
      }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%irb_research_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
      return [
          [['research_id','message','type'],'required'],
          [['type','data'], 'string'],
          [['research_id', 'created_at','created_by'], 'integer'],
          [['message'], 'string', 'max' => 255]
      ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'research_id' => Yii::t('app', 'Research ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'message' => Yii::t('app', 'Message'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @inheritdoc
     * @return ResearchLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResearchLogQuery(get_called_class());
    }


}
