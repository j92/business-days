<?php

namespace BusinessDays\Calculations;

class AmountOfBusinessDaysInPeriod extends AbstractBusinessDayCalculator implements Calculation
{
    /**
     * @var \DatePeriod
     */
    protected $period;

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
        parent::__construct($enrichmentProviders);
        $this->period = $period;
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
}
