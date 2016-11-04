<?php

namespace Tests\Unit\Custom\Util;

use BusinessDays\Util\WeekendProvider;

class WeekendProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testIsBusinessDays_withWeekendDays_returnsFalse()
    {
        $enricher = new WeekendProvider();

        $this->assertFalse($enricher->isBusinessDay(new \DateTime('29-10-2016')));
        $this->assertFalse($enricher->isBusinessDay(new \DateTime('30-10-2016')));
    }
}
