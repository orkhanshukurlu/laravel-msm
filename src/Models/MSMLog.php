<?php

declare(strict_types=1);

namespace OrkhanShukurlu\MSM\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class MSMLog extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sent_at' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'phone',
        'message',
        'response_code',
        'response_text',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'msm_logs';

    /**
     * Get all log data by the phone number.
     *
     * @param int|string $phone
     *
     * @return Collection
     */
    public static function getByPhone(int|string $phone): Collection
    {
        return self::query()
            ->where('phone', $phone)
            ->get();
    }
}
