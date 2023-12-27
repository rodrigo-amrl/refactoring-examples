<?php

declare(strict_types=1);

use App\CatalogRefactoring\InlineFunction\DriverRatingRefactored;
use App\CatalogRefactoring\InlineFunction\Factories\CustomerFactory;
use App\CatalogRefactoring\InlineFunction\Factories\DriverFactory;
use App\CatalogRefactoring\InlineFunction\ReportRefactored;
use PHPUnit\Framework\TestCase;

final class InlineFunctionTest extends TestCase
{
    public function testRatingDriver(): void
    {
        $driverRating = new DriverRatingRefactored();
        $result = $driverRating->rating(DriverFactory::make());

        $this->assertEquals($result, 2);
    }
    public function testReportLines(): void
    {
        $customer = CustomerFactory::make();

        $report = new ReportRefactored();
        $lines = $report->reportLines($customer);

        $this->assertEquals($lines['name'], $customer['name']);
        $this->assertEquals($lines['location'], $customer['location']);
    }
}
