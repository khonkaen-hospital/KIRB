<?php

namespace common\models\query;
use Yii;
use common\models\Research;
/**
 * This is the ActiveQuery class for [[\common\models\Research]].
 *
 * @see \common\models\Research
 */
class ResearchQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    public function byDraft($id)
    {
        $this->andWhere("submission_status = :submission_status and id = :id ",[':id'=>$id,':submission_status' => Research::SUBMISSION_STATUS_DRAFT]);
        return $this;
    }

    public function byResearcher()
    {
        $this->andWhere('user_id=:user_id',[':user_id'=>Yii::$app->user->id]);
        return $this;
    }
    /**
     * @inheritdoc
     * @return \common\models\Research[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Research|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}