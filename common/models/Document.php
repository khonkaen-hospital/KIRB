<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;
/**
 * This is the model class for table "irb_document".
 *
 * @property integer $id
 * @property integer $research_id
 * @property integer $document_type_id
 * @property string $filename
 * @property string $real_filename
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $status
 *
 * @property IrbDocumentType $documentType
 * @property IrbResearch $research
 */
class Document extends \yii\db\ActiveRecord
{
    public $attach_file;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'attach_file' => [
                'class' => UploadBehavior::className(),
                'attribute' => 'attach_file',
                'pathAttribute' => 'filename',
                'baseUrlAttribute' => 'real_filename'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'irb_document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['filename'],'required'],
            [['document_type_id', 'created_at', 'updated_at'], 'integer'],
            [['status'], 'string'],
            [['filename', 'real_filename'], 'string', 'max' => 255],
            [['attach_file'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'research_id' => Yii::t('app', 'เลขอ้างอิง'),
            'document_type_id' => Yii::t('app', 'ประเภทไฟล์'),
            'filename' => Yii::t('app', 'ชื่อไฟล์'),
            'real_filename' => Yii::t('app', 'ชื่อไฟล์จริง'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'สถานะไฟล์'),
            'documentType' => Yii::t('app', 'ประเภทไฟล์'),
            'researchTh' => Yii::t('app', 'ชื่องานวิจัย (Th)'),
            'researchEn' => Yii::t('app',  'ชื่องานวิจัย (En)'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentType()
    {
        return $this->hasOne(\common\models\DocumentType::className(), ['id' => 'document_type_id']);
    }

    public function getDocumentName(){
        return $this->documentType->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResearch()
    {
        return $this->hasOne(\common\models\Research::className(), ['id' => 'research_id']);
    }

    public function getResearchNameTh(){
        return $this->research->name_th;
    }

    public function getResearchNameEn(){
        return $this->research->name_en;
    }

    /**
     * @inheritdoc
     * @return \common\models\query\DocumentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\DocumentQuery(get_called_class());
    }
}
