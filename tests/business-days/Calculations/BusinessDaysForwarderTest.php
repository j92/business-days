<?php

namespace Tests\BusinessDays\Calculations;

use BusinessDays\Calculations\BusinessDaysForwarder;
use BusinessDays\Util\WeekendEnrichmentProvider;

class BusinessDaysForwarderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideDates
     * @param \DateTime $startDate
     * @param $forwardBusinessDays
     *
     * @param \DateTime $expectedDate
     */
    public function testGetResult(\DateTime $startDate, $forwardBusinessDays, \DateTime $expectedDate)
    {
        $forwarder = new BusinessDaysForwarder($startDate, $forwardBusinessDays, [new WeekendEnrichmentProvider()]);

        $this->assertEquals($expectedDate, $forwarder->getResult());
    }

    /**
     * DataProvider for testGetResult
     *
     * @return array
     */
    public function provideDates()
    {
        return [
            [new \DateTime('01-01-2016'), 10, new \DateTime('15-01-2016')],
            [new \DateTime('01-04-2016'), 21, new \DateTime('02-05-2016')],
        ];
    }
}
