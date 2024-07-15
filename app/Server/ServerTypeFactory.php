<?php

namespace App\Server;

use App\Models\Server;
use App\Server\Types\AppServer;

class ServerTypeFactory
{
    public static function make(Server $server)
    {
        return match($server->type) {
            'app' => new AppServer($server),
        };
    }
}
