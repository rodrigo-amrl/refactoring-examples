<?php

use App\CatalogRefactoring\IntroduceSpecialCase\Example1\SiteOld;
use App\CatalogRefactoring\IntroduceSpecialCase\Example1\SiteRefactored;
use App\CatalogRefactoring\IntroduceSpecialCase\Example2\SiteOld as Example2SiteOld;
use App\CatalogRefactoring\IntroduceSpecialCase\Example2\SiteRefactored as Example2SiteRefactored;
use App\CatalogRefactoring\IntroduceSpecialCase\Example3\SiteOld as Example3SiteOld;
use App\CatalogRefactoring\IntroduceSpecialCase\Example3\SiteRefactored as Example3SiteRefactored;

use PHPUnit\Framework\TestCase;

final class IntroduceSpecialCaseTest extends TestCase
{

    #region Example 1
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
    #endregion

    #region Example 2
    public function testGetCustomerNameOld()
    {
        $site = new Example2SiteOld();
        $response = $site->getCustomerName();
        $this->assertEquals('occupant', $response);
    }
    public function testGetBillingPlanOld()
    {
        $site = new Example2SiteOld();
        $response = $site->getCustomerBillingPlan();
        $this->assertEquals('start', $response);
    }
    public function testgetWeeksDelinquentOld()
    {
        $site = new Example2SiteOld();
        $response = $site->getWeeksDelinquent();
        $this->assertEquals(0, $response);
    }
    public function testGetCustomerNameRefactored()
    {
        $site = new Example2SiteOld();
        $response = $site->getCustomerName();
        $this->assertEquals('occupant', $response);
    }
    public function testGetBillingPlanRefactored()
    {
        $site = new Example2SiteRefactored();
        $response = $site->getCustomerBillingPlan();
        $this->assertEquals('start', $response);
    }
    public function testgetWeeksDelinquentRefactored()
    {
        $site = new Example2SiteRefactored();
        $response = $site->getWeeksDelinquent();
        $this->assertEquals(0, $response);
    }
    #endregion

    #region Example 3
    public function testGetCustomerNameOld2()
    {
        $site = new Example3SiteOld();
        $response = $site->getCustomerName();
        $this->assertEquals('Acme Industries', $response);
    }
    public function testGetBillingPlanOld2()
    {
        $site = new Example3SiteOld();
        $response = $site->getCustomerBillingPlan();
        $this->assertEquals('plan-451', $response);
    }
    public function testgetWeeksDelinquentOld2()
    {
        $site = new Example3SiteOld();
        $response = $site->getWeeksDelinquent();
        $this->assertEquals(7, $response);
    }
    public function testGetCustomerNameRefactored2()
    {
        $site = new Example3SiteOld();
        $response = $site->getCustomerName();
        $this->assertEquals('Acme Industries', $response);
    }
    public function testGetBillingPlanRefactored2()
    {
        $site = new Example3SiteRefactored();
        $response = $site->getCustomerBillingPlan();
        $this->assertEquals('plan-451', $response);
    }
    public function testgetWeeksDelinquentRefactored2()
    {
        $site = new Example3SiteRefactored();
        $response = $site->getWeeksDelinquent();
        $this->assertEquals(7, $response);
    }
    #endregion
}
