<?php
/**
 * Eugine Terentev <eugine@terentev.net>
 */

namespace common\rbac;

use yii\rbac\Item;
use yii\rbac\Rule;

class SubmissionRule extends Rule
{
    /** @var string */
    public $name = 'submissionRule';

    /**
     * @param int $user
     * @param Item $item
     * @param array $params
     * - model: model to check owner
     * - attribute: attribute that will be compared to user ID
     * @return bool
     */
    public function execute($user, $item, $params)
    {
        return isset($params['research']) ? $params['research']->SubmisstionStatusEdit == true : false;
    }
}
