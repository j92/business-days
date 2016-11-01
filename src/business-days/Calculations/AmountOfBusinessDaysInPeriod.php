<?php

namespace BusinessDays\Calculations;

use BusinessDays\Util\DateEnrichmentProvider;

class AmountOfBusinessDaysInPeriod implements Calculation
{
    /**
     * @var \DatePeriod
     */
    protected $period;

    /**
     * @var DateEnrichmentProvider
     */
    protected $enrichmentProviders;

    /**
     * @var int
     */
    protected $businessDays;

    /**
     * AmountOfBusinessDaysInPeriod constructor.
     *
     * @param \DatePeriod $period
     * @param array       $enrichmentProviders
     */
    public function __construct(\DatePeriod $period, array $enrichmentProviders)
    {
        $this->period = $period;
        $this->enrichmentProviders = $enrichmentProviders;
        $this->businessDays = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function getResult()
    {
        $this->businessDays = 0;

        foreach ($this->period as $date) {
            if ($this->isBusinessDay($date)) {
                $this->businessDays++;
            }
        }

        return $this->businessDays;
    }

    /**
     * @param \DateTime $date
     *
     * @return bool
     */
    private function isBusinessDay(\DateTime $date)
    {
        foreach ($this->enrichmentProviders as $enrichmentProvider) {
            if (!$enrichmentProvider->isBusinessDay($date)) {
                return false;
            }
        }

        return true;
    }
}
