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
        $weekend = ['Sat', 'Sun'];

        if (in_array($dateTime->format('D'), $weekend)) {
            return false;
        }

        return true;
    }
}
