<?php

namespace App\CatalogRefactoring\IntroduceSpecialCase;

use Exception;

class UnknownCustomer
{

    const BASIC_BILLING_PLAN = "start";

    public function isUnknown($arg)
    {
        function isUnknown($arg)
        {
            if (!(($arg instanceof CustomerRefactored) || $arg instanceof UnknownCustomer)) {
                throw new Exception("investigate bad value: <" . $arg . ">");
            }
            return ($arg === "unknown");
        }
    }
    public function getName()
    {
        return "occupant";
    }
    public function getBillingPlan()
    {
        return  self::BASIC_BILLING_PLAN;
    }
    public function setBillingPlan($new_plan)
    {
        return false;
    }
}
