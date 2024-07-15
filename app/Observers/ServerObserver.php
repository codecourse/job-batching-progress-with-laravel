<?php

namespace App\Observers;

use App\Jobs\Server\CreateServer;
use App\Jobs\Server\FinalizeServer;
use App\Jobs\Server\InstallNginx;
use App\Jobs\Server\InstallPHP;
use App\Models\Server;
use App\Server\ServerTypeFactory;
use App\Server\States\Complete;
use App\Server\States\InProgress;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

class ServerObserver
{
    /**
     * Handle the Server "created" event.
     */
    public function created(Server $server): void
    {
        $serverType = ServerTypeFactory::make($server);

        $server->tasks()->saveMany($serverType->tasks());

        $batch = Bus::batch($serverType->jobs())
            ->before(function (Batch $batch) use ($server) {
                $server->tasks()->first()->state->transitionTo(InProgress::class);
            })
            ->progress(function (Batch $batch) use ($server) {
                $task = $server->taskCurrentlyInProgress();

                $task->state->transitionTo(Complete::class);

                $task->next()
                    ->state
                    ->transitionTo(InProgress::class);
            })
            ->dispatch();

        $server->update([
            'batch_id' => $batch->id,
        ]);
    }
}
