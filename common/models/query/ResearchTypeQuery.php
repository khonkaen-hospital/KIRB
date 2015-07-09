<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ResearchType]].
 *
 * @see \common\models\ResearchType
 */
class ResearchTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ResearchType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ResearchType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}