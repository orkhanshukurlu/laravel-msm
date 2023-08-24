<?php

declare(strict_types=1);

namespace OrkhanShukurlu\MSM\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void send(string $phone, int|string $message)
 *
 * @see \OrkhanShukurlu\MSM\SendSMS
 */
final class MSM extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \OrkhanShukurlu\MSM\SendSMS::class;
    }
}
