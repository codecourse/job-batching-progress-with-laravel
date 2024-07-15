<?php

namespace App\Jobs\Server\Interfaces;

interface ServerJob
{
    public function title(): string;
    public function description(): string;
}
