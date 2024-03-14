<?php

declare(strict_types=1);

namespace OrkhanShukurlu\MSM\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MSMLog extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sent_at' => 'datetime',
        ];
    }

    /**
     * Get all log data by the response code.
     *
     * @param int $code
     * @param string[] $columns
     *
     * @return Collection
     */
    public static function getByCode(int $code, array $columns = ['*']): Collection
    {
        return self::query()
            ->where('response_code', $code)
            ->get($columns);
    }

    /**
     * Get all log data by the phone number.
     *
     * @param string $phone
     * @param string[] $columns
     *
     * @return Collection
     */
    public static function getByPhone(string $phone, array $columns = ['*']): Collection
    {
        return self::query()
            ->where('phone', $phone)
            ->get($columns);
    }
}
