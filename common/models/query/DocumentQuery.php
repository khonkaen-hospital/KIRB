<?php

namespace common\models\query;
use Yii;
/**
 * This is the ActiveQuery class for [[\common\models\Document]].
 *
 * @see \common\models\Document
 */
class DocumentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    public function byResearch($research_id)
    {
        $this->andWhere('research_id=:research_id',[':research_id'=>$research_id]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return \common\models\Document[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Document|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}