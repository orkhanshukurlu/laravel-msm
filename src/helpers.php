<?php

declare(strict_types=1);

use OrkhanShukurlu\MSM\SendSMS;

if (! function_exists('msm')) {
    /**
     * Get the available send SMS instance.
     *
     * @param string|null $phone
     * @param int|string|null $message
     *
     * @return SendSMS
     */
    function msm(?string $phone, int|string|null $message): SendSMS
    {
        if (func_num_args() === 0) {
            return app(SendSMS::class);
        }

        return app(SendSMS::class)->send($phone, $message);
    }
}
