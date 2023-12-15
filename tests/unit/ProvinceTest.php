<?php

declare(strict_types=1);

use App\ProdutionPlan\Factories\ProvinceFactory;
use App\ProdutionPlan\Province;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\CodeCoverage\StaticAnalysis\CacheWarmer;

final class ProvinceTest extends TestCase
{
    private ?Province $province;

    public function testShortFaill()
    {
        $province =  new Province(...ProvinceFactory::make());
        $this->assertEquals($this->province->getShortFall(), 5);
    }
    public function testProfit()
    {
        $province =  new Province(...ProvinceFactory::make());
        $this->assertEquals($this->province->getProfit(), 230);
    }
    public function testChangeProduction()
    {
        $province =  new Province(...ProvinceFactory::make());
        $this->province->producers[0]->setProduction(20);
        $this->assertEquals($this->province->getShortFall(), -6);
        $this->assertEquals($this->province->getProfit(), 280);
    }
    public function testShortFallNoProducers()
    {
        $province =  new Province(...ProvinceFactory::makeNoProducers());
        $this->assertEquals($province->getShortFall(), 30);
    }
    public function testProfitNoProducers()
    {
        $province = new Province(...ProvinceFactory::makeNoProducers());
        $this->assertEquals($province->getProfit(), 0);
    }
    public function testZeroDemand()
    {
        $province = new Province(...ProvinceFactory::make());
        $province->setDemand(0);
        $this->assertEquals($province->getShortFall(), -25);
        $this->assertEquals($province->getProfit(), 0);
    }
    public function testNegativeDemand()
    {
        $province = new Province(...ProvinceFactory::make());
        $province->setDemand(-1);
        $this->assertEquals($province->getShortFall(), -26);
        $this->assertEquals($province->getProfit(), -10);
    }
    public function testEmptyStringDemand()
    {
        $province = new Province(...ProvinceFactory::make());
        $province->setDemand(null);
        $this->assertEquals($province->getShortFall(), -25);
        $this->assertEquals($province->getProfit(), 0);
    }
    public function testStringForProducers()
    {
        $this->expectExceptionMessageMatches("/must be of type array/");
        new Province(...ProvinceFactory::makeStringProducers());
    }
}
