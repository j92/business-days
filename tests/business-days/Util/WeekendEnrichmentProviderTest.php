<?php

namespace Tests\Unit\Custom\Util;

use BusinessDays\Util\WeekendEnrichmentProvider;

class WeekendEnrichmentProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testIsBusinessDays_withWeekendDays_returnsFalse()
    {
        $enricher = new WeekendEnrichmentProvider();

        $this->assertFalse($enricher->isBusinessDay(new \DateTime('29-10-2016')));
        $this->assertFalse($enricher->isBusinessDay(new \DateTime('30-10-2016')));
    }
}
