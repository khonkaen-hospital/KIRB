<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%irb_document_type}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $status
 */
class DocumentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%irb_document_type}}';
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
     * @return \common\models\query\DocumentTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\DocumentTypeQuery(get_called_class());
    }
}
