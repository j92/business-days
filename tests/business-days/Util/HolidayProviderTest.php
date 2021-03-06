<?php

namespace Tests\BusinessDays\Util;

use BusinessDays\Util\HolidayProvider;

class HolidayProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testIsBusinessDay_givenHoliday_returnsFalse()
    {
        $provider = new HolidayProvider();
        $this->assertFalse($provider->isBusinessDay(new \DateTime('01-01-2016')));
    }

    public function testIsBusinessDay_givenHolidaysInDifferentYears_returnCorrectResult()
    {
        $provider = new HolidayProvider();
        $this->assertFalse($provider->isBusinessDay(new \DateTime('25-12-2014')));
        $this->assertFalse($provider->isBusinessDay(new \DateTime('25-12-2015')));
        $this->assertFalse($provider->isBusinessDay(new \DateTime('01-01-2016')));
    }
}
