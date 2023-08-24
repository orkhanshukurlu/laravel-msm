<?php

declare(strict_types=1);

namespace OrkhanShukurlu\MSM;

use Illuminate\Support\ServiceProvider;
use OrkhanShukurlu\MSM\Facades\MSM;

use function file_exists;

final class MSMServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        if (file_exists($file = __DIR__ . '/helpers.php')) {
            require_once $file;
        }

        $this->publishes([
            __DIR__ . '/../config/msm.php' => config_path('msm.php'),
        ], 'msm-config');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_msm_logs_table.php' => $this->app->databasePath(
                'migrations/' . date('Y_m_d_His') . '_create_msm_logs_table.php'
            ),
        ], 'msm-migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/msm.php', 'msm');

        $this->app->singleton('msm', fn(): MSM => new MSM());
    }
}
