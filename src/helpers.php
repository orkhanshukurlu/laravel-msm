<?php

declare(strict_types=1);

use OrkhanShukurlu\MSM\SendSMS;

if (! function_exists('msm')) {
    /**
     * Get the available send SMS instance.
     *
     * @return SendSMS
     */
    function msm(): SendSMS
    {
        return app(SendSMS::class);
    }
}
