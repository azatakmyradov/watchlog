<?php

namespace Akmyradov\WatchLog\Facades;

use Akmyradov\WatchLog\WatchLog as LaravelWatchLog;

// ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug']
/**
 * @method static LaravelWatchLog create()
 * @method static LaravelWatchLog log(string $level, string $message, array $context = [])
 * @method static LaravelWatchLog emergency(string $message, array $context = [])
 * @method static LaravelWatchLog alert(string $message, array $context = [])
 * @method static LaravelWatchLog critical(string $message, array $context = [])
 * @method static LaravelWatchLog error(string $message, array $context = [])
 * @method static LaravelWatchLog warning(string $message, array $context = [])
 * @method static LaravelWatchLog notice(string $message, array $context = [])
 * @method static LaravelWatchLog info(string $message, array $context = [])
 * @method static LaravelWatchLog debug(string $message, array $context = [])
 *
 * @see \Akmyradov\WatchLog\WatchLog
 */
class WatchLog extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \Akmyradov\WatchLog\WatchLog::class;
    }
}
