<?php

namespace App\Jobs\Server;

use App\Jobs\Server\Interfaces\ServerJob;
use App\Models\Server;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\SkipIfBatchCancelled;
use Illuminate\Queue\SerializesModels;

class CreateServer implements ShouldQueue, ServerJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Server $server)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(3);
    }

    public function middleware(): array
    {
        return [new SkipIfBatchCancelled()];
    }

    public function title(): string
    {
        return 'Create server #' . $this->server->id;
    }

    public function description(): string
    {
        return 'Creating your server';
    }
}
