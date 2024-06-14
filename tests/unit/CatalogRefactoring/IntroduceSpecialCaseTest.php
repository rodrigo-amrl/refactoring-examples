<?php

use App\CatalogRefactoring\IntroduceSpecialCase\SiteOld;
use App\CatalogRefactoring\IntroduceSpecialCase\SiteRefactored;
use PHPUnit\Framework\TestCase;

final class IntroduceSpecialCaseTest extends TestCase
{

    public function testGetUnknownCustomerNameOld()
    {
        $site = new SiteOld();
        $response = $site->getCustomerName();
        $this->assertEquals('occupant', $response);
    }
    public function testGetUnknownBillingPlanOld()
    {
        $site = new SiteOld();
        $response = $site->getCustomerBillingPlan();
        $this->assertEquals('start', $response);
    }
    public function testsetUnknownCustomerBillingPlanOld()
    {
        $site = new SiteOld();
        $response = $site->setCustomerBillingPlan('plus');
        $this->assertEquals('start', $response);
    }

    public function testGetUnknownCustomerNameRefactored()
    {
        $site = new SiteRefactored();
        $response = $site->getCustomerName();
        $this->assertEquals('occupant', $response);
    }
    public function testGetUnknownBillingPlanRefactored()
    {
        $site = new SiteRefactored();
        $response = $site->getCustomerBillingPlan();
        $this->assertEquals('start', $response);
    }
    public function testsetUnknownCustomerBillingPlanRefactored()
    {
        $site = new SiteRefactored();
        $response = $site->setCustomerBillingPlan('plus');
        $this->assertEquals('start', $response);
    }
}
