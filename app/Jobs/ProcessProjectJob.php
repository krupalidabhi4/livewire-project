<?php

namespace App\Jobs;

use App\Services\ProjectService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessProjectJob implements ShouldQueue
{
    use Dispatchable, Queueable, InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct() {

        Log::info('ProcessProjectJob instantiated', [
            'timestamp' => now(),
        ]);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Job started processing', [
            'job_id' => $this->job?->getJobId(),
            'attempts' => $this->attempts(),
            'timestamp' => now(),
        ]);

        try {
            Log::info('Project created successfully from queue job', [
                'job_id' => $this->job?->getJobId(),
                'timestamp' => now(),
            ]);
        } catch (\Exception $e) {
            Log::error('Error processing project in queue job', [
                'job_id' => $this->job?->getJobId(),
                'error' => $e->getMessage(),
                'attempts' => $this->attempts(),
                'timestamp' => now(),
            ]);

            // Re-throw the exception to mark job as failed
            throw $e;
        }
    }

    /**
     * Handle job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error('Job failed permanently', [
            'job_id' => $this->job?->getJobId(),
            'error' => $exception->getMessage(),
            'attempts' => $this->attempts(),
            'timestamp' => now(),
        ]);
    }
}
