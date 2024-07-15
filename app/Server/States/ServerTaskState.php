<?php

namespace App\Server\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class ServerTaskState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, InProgress::class)
            ->allowTransition(InProgress::class, Complete::class)
            ->allowTransition(InProgress::class, Failed::class);
    }
}
