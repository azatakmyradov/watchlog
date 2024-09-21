<?php

declare(strict_types=1);

namespace Akmyradov\WatchLog;

use Illuminate\Support\ServiceProvider;

class WatchLogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/watchlog.php' => config_path('watchlog.php'),
        ], ['laravel-assets']);
    }
}
