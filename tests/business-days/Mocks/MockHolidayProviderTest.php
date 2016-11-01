<?php

namespace Tests\BusinessDays\Mocks;

class MockHolidayProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testIsBusinessDay_alwaysReturnsTrue()
    {
        $provider = new MockHolidayProvider();
        $isBusinessDay = $provider->isBusinessDay(new \DateTime());

        $this->assertTrue($isBusinessDay);
    }
}
