<?php

namespace BusinessDays\Calculations;

use BusinessDays\Util\DateEnrichmentProvider;

class AbstractBusinessDayCalculator
{
    /**
     * @var DateEnrichmentProvider
     */
    protected $enrichmentProviders;

    /**
     * AbstractBusinessDayCalculator constructor.
     * @param DateEnrichmentProvider[] $enrichmentProviders
     */
    public function __construct(array $enrichmentProviders)
    {
        $this->enrichmentProviders = $enrichmentProviders;
    }

    /**
     * @param \DateTime $date
     *
     * @return bool
     */
    protected function isBusinessDay(\DateTime $date)
    {
        foreach ($this->enrichmentProviders as $enrichmentProvider) {
            if (!$enrichmentProvider->isBusinessDay($date)) {
                return false;
            }
        }

        return true;
    }
}