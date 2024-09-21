<?php

declare(strict_types=1);

namespace Akmyradov\WatchLog;

use Akmyradov\WatchLog\Jobs\ProcessLog;
use Exception;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Psr\Log\LogLevel;

class WatchLog
{
    protected array $drivers = ['sync', 'queue'];

    public function __construct()
    {
        if (! in_array($this->getDriver(), $this->drivers) && $this->getDriver()) {
            throw new Exception('WatchLog driver: '.$this->driver.' not found');
        }
    }

    public function getDriver(): ?string
    {
        return config('wathclog.driver');
    }

    public function getUrl(): string
    {
        return sprintf('%s/api/projects/%d/logs', config('watchlog.base_url'), config('watchlog.project_id'));
    }

    public function createClient(): PendingRequest
    {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.config('watchlog.secret'),
        ]);
    }

    public static function create(): static
    {
        return new static();
    }

    public function log(string $level, string $message, array $context = [])
    {
        $data = [
            'message' => $message,
            'environment' => config('app.env'),
            'level' => $level,
            'origin' => collect(request()->ips())->join(','),
            'user' => auth()?->user(),
            'context' => $context,
        ];

        match ($this->driver) {
            'sync' => ProcessLog::dispatchSync($data),
            'queue' => ProcessLog::dispatch($data),
        };
    }

    public function emergency(string $message, array $context = [])
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert(string $message, array $context = [])
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical(string $message, array $context = [])
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function error(string $message, array $context = [])
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning(string $message, array $context = [])
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function notice(string $message, array $context = [])
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function info(string $message, array $context = [])
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug(string $message, array $context = [])
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function listen($events)
    {
        Event::listen($events, function ($event) {
            $this->log($event->level, $event->message, $event->context);
        });
    }
}
