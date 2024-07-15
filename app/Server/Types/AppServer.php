<?php

namespace App\Server\Types;

use App\Jobs\Server\CreateServer;
use App\Jobs\Server\FinalizeServer;
use App\Jobs\Server\InstallNginx;
use App\Models\Server;
use App\Server\Traits\CreatesTasks;

class AppServer
{
    use CreatesTasks;

    public function __construct(protected Server $server) {}

    public function jobs(): array
    {
        return [
            1 => new CreateServer($this->server),
            2 => new InstallNginx($this->server),
            3 => new FinalizeServer($this->server),
        ];
    }
}
