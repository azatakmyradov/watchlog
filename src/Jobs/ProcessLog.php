<?php

namespace Akmyradov\WatchLog\Jobs;

use Akmyradov\WatchLog\Facades\WatchLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessLog implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected array $data,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        WatchLog::createClient()->post(
            WatchLog::getUrl(),
            $this->data
        );
    }
}
