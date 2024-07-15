<?php

namespace App\Server\Types;

use App\Jobs\Server\CreateServer;
use App\Jobs\Server\FinalizeServer;
use App\Jobs\Server\InstallNginx;
use App\Models\Server;

class AppServer
{
    public function __construct(protected Server $server) {}

    public function jobs(): array
    {
        return [
            1 => new CreateServer(),
            2 => new InstallNginx(),
            3 => new FinalizeServer(),
        ];
    }
}
