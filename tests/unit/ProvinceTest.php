<?php

declare(strict_types=1);

use App\ProdutionPlan\Factories\ProvinceFactory;
use App\ProdutionPlan\Province;
use PHPUnit\Framework\TestCase;

final class ProvinceTest extends TestCase
{

    public function testShortFaill()
    {
        $province = new Province(...ProvinceFactory::make());
        $this->assertEquals($province->getShortFall(), 5);
    }
}
