<?php

namespace BusinessDays\Util;

use Yasumi\Provider\AbstractProvider;
use Yasumi\Yasumi;

class HolidayProvider implements DateEnrichmentProvider
{
    /**
     * @var AbstractProvider[]
     */
    protected $holidayProviders;

    /**
     * {@inheritdoc}
     */
    public function isBusinessDay(\DateTime $date)
    {
        $year = $date->format('Y');

        if (!isset($this->holidayProviders[$year])) {
            $this->holidayProviders[$year] = Yasumi::create('Netherlands', $year);
        }

        return !$this->holidayProviders[$year]->isHoliday($date);
    }
}
