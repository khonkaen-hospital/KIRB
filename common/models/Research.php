<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "{{%irb_research}}".
 *
 * @property integer $id
 * @property string $kecode
 * @property string $date_receive
 * @property string $no_receive
 * @property string $name_th
 * @property string $name_en
 * @property integer $user_id
 * @property integer $type_id
 * @property integer $category_id
 * @property integer $fund_id
 * @property string $fund_description
 * @property string $detail
 * @property string $submission_status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Research extends \yii\db\ActiveRecord
{
    const SUBMISSION_STATUS_DRAFT   = 'draft';
    const SUBMISSION_STATUS_SUBMIT  = 'submit';
    const SUBMISSION_STATUS_REJECT  = 'reject';
    const SUBMISSION_STATUS_APPROVE = 'approve';
    const SUBMISSION_STATUS_SUCCESS = 'success';

    public $confirm_submission;

    public function behaviors(){
        return [
            TimestampBehavior::className(),
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute'=>'user_id',
                'updatedByAttribute' => 'user_id',
            ]
        ];
    }

    /**     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%irb_research}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_th','name_en','type_id','fund_id'],'required','on'=>'default'],
            [['confirm_submission'],'required','on'=>'submission','requiredValue'=>'1'],
            [['user_id', 'type_id', 'category_id', 'fund_id', 'created_at', 'updated_at','submit_at','reject_at','approve_at','success_at'], 'integer'],
            [['detail', 'submission_status'], 'string'],
            [['kecode'], 'string', 'max' => 7],
            [['date_receive'], 'string', 'max' => 255],
            [['no_receive'], 'string', 'max' => 10],
            [['name_th', 'name_en'], 'string', 'max' => 600],
            [['fund_description'], 'string', 'max' => 256],
            [['kecode'], 'unique']

           
        ];
    }

   public function scenarios()
    {
         $scenarios = parent::scenarios();
         $scenarios['sumbmission'] = ['confirm_submission','submit_at'];
         return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kecode' => Yii::t('app', 'รหัสโครงการ'),
            'date_receive' => Yii::t('app', 'วันที่ลงรับ'),
            'no_receive' => Yii::t('app', 'เลขที่ลงรับ'),
            'name_th' => Yii::t('app', 'ชื่อโครงการวิจัย(th)'),
            'name_en' => Yii::t('app', 'ชื่อโครงการวิจัย(en)'),
            'user_id' => Yii::t('app', 'รหัสนักวิจัย'),
            'type_id' => Yii::t('app', 'ประเภทโครงการ'),
            'category_id' => Yii::t('app', 'หมวดหมู่โครงการ'),
            'fund_id' => Yii::t('app', 'ประเภทแหล่งเงินทุน'),
            'fund_description' => Yii::t('app', 'รายละเอียดแหล่งเงินทุน'),
            'detail' => Yii::t('app', 'รายละเอียดเพิ่มเติม'),
            'created_at' => Yii::t('app', 'วันทีลงทะเบียน'),
            'updated_at' => Yii::t('app', 'วันที่ปรับปรุงข้อ้มูล'),
            'researchType' => Yii::t('app', 'ประเภทโครงการ'),
            'researchFundName' => Yii::t('app', 'ประเภทโครงการ'),
            'confirm_submission' => Yii::t('app', 'ยืนยันลงทะเบียนงานวิจัย'),
            'submissionStatusLabel' => Yii::t('app', 'สถานะ'),
            'submit_at' => Yii::t('app', 'ยื่นคำร้องวันที่'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResearcher()
    {
        return @$this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getResearcherName()
    {
        return @$this->researcher->userProfile->fullName;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResearchType(){
        return @$this->hasOne(ResearchType::className(), ['id' => 'type_id']);
    }

    public function getResearchTypeName(){
        return @$this->researchType->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResearchFund(){
        return @$this->hasOne(ResearchFund::className(), ['id' => 'type_id']);
    }

    public function getResearchFundName(){
        return @$this->researchFund->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return @$this->hasMany(Document::className(), ['research_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ResearchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ResearchQuery(get_called_class());
    }

    public static function itemsAlias(){
        return [
            self::SUBMISSION_STATUS_DRAFT   => ucfirst(self::SUBMISSION_STATUS_DRAFT),
            self::SUBMISSION_STATUS_SUBMIT  => ucfirst(self::SUBMISSION_STATUS_SUBMIT),
            self::SUBMISSION_STATUS_REJECT  => ucfirst(self::SUBMISSION_STATUS_REJECT),
            self::SUBMISSION_STATUS_APPROVE => ucfirst(self::SUBMISSION_STATUS_APPROVE),
            self::SUBMISSION_STATUS_SUCCESS => ucfirst(self::SUBMISSION_STATUS_SUCCESS),
        ];
    }

    public static function getItemAilas($key){
        $items = self::itemsAlias();
        return array_key_exists($key,$items)?$items[$key]:null;
    }

    public function getSubmissionStatusLabel(){
        return Research::getItemAilas($this->submission_status);
    }


}
