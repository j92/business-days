<?php

namespace BusinessDays\Util;

interface DateEnrichmentProvider
{
    public function isBusinessDay(\DateTime $date);
}
