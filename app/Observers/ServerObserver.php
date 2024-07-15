<?php

namespace App\Observers;

use App\Jobs\Server\CreateServer;
use App\Jobs\Server\FinalizeServer;
use App\Jobs\Server\InstallNginx;
use App\Jobs\Server\InstallPHP;
use App\Models\Server;
use Illuminate\Support\Facades\Bus;

class ServerObserver
{
    /**
     * Handle the Server "created" event.
     */
    public function created(Server $server): void
    {
        $batch = Bus::batch([
            new CreateServer(),
            new InstallNginx(),
            new InstallPHP(),
            new FinalizeServer()
        ])
            ->dispatch();

        $server->update([
            'batch_id' => $batch->id,
        ]);
    }
}
