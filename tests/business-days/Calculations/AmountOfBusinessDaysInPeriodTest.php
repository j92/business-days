<?php

namespace Tests\BusinessDays\Calculations;

use BusinessDays\Calculations\AmountOfBusinessDaysInPeriod;
use BusinessDays\Util\HolidayEnrichmentProvider;
use BusinessDays\Util\WeekendEnrichmentProvider;

class AmountOfBusinessDaysInPeriodTest extends \PHPUnit_Framework_TestCase
{
    public function testGetResult_canHandleMultipleEnrichmentProviders()
    {
        $this->assertHolidays('01-01-2016', '05-01-2016', 1);
    }

    public function testGetResult_handlesWeekendsAndDutchHolidays()
    {
        $this->assertHolidays('2015-12-21', '2016-01-04', 8);
    }

    public function assertHolidays(string $startDate, string $endDate, int $expected)
    {
        $startDate = new \DateTime($startDate);
        $endDate = new \DateTime($endDate);

        $period = new \DatePeriod($startDate, new \DateInterval('P1D'), $endDate);

        $calculation = new AmountOfBusinessDaysInPeriod($period, [
            new HolidayEnrichmentProvider(),
            new WeekendEnrichmentProvider()
        ]);

        $this->assertEquals($expected, $calculation->getResult());
    }
}
