<?php

namespace BusinessDays\Calculations;

use BusinessDays\Util\DateEnrichmentProvider;

class BusinessDaysForwarder extends AbstractBusinessDayCalculator implements Calculation
{
    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * The amount of business days to forward
     *
     * @var int
     */
    protected $businessDaysToForward;

    /**
     * BusinessDaysForwarder constructor.
     * @param \DateTime $startDate
     * @param int $forward
     * @param DateEnrichmentProvider[] $enrichmentProviders
     */
    public function __construct(\DateTime $startDate, $forward, array $enrichmentProviders = array())
    {
        parent::__construct($enrichmentProviders);

        $this->startDate = $startDate;
        $this->businessDaysToForward = $forward;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        $forwardedBusinessDays = 0;

        while ($forwardedBusinessDays < $this->businessDaysToForward) {
            $currentDate = $this->startDate->add(new \DateInterval('P1D'));

            if ($this->isBusinessDay($currentDate)) {
                $forwardedBusinessDays++;
            }
        }

        return $currentDate;
    }
}