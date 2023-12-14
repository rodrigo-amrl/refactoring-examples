<?php

declare(strict_types=1);

use App\ProdutionPlan\Factories\ProvinceFactory;
use App\ProdutionPlan\Province;
use PHPUnit\Framework\TestCase;

final class ProvinceTest extends TestCase
{
    // private ?Province $province;

    public function testShortFaill()
    {
        $province = new Province(...ProvinceFactory::make());
        $this->assertEquals($province->getShortFall(), 5);
    }
    public function testProfit()
    {
        $province = new Province(...ProvinceFactory::make());
        $this->assertEquals($province->getProfit(), 230);
    }
    // protected function setUp(): void
    // {
    //     $this->province = new Province(...ProvinceFactory::make());
    //     return;
    // }
    // protected function tearDown(): void
    // {
    //     $this->province = null;
    //     return;
    // }
}
