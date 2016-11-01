<?php

namespace Tests\BusinessDays\Mocks;

use BusinessDays\Util\DateEnrichmentProvider;

class MockHolidayProvider implements DateEnrichmentProvider
{
    public function isBusinessDay(\DateTime $date)
    {
        return true;
    }
}
