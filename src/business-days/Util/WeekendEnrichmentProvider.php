<?php

namespace BusinessDays\Util;

class WeekendEnrichmentProvider implements DateEnrichmentProvider
{
    /**
     * @param \DateTime $dateTime
     *
     * @return bool
     */
    public function isBusinessDay(\DateTime $dateTime)
    {
        return !in_array($dateTime->format('D'), ['Sat', 'Sun']);
    }
}
