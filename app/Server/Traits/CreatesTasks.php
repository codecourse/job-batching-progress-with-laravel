<?php

namespace App\Server\Traits;

use App\Models\ServerTask;

trait CreatesTasks
{
    public function tasks()
    {
        return collect($this->jobs())->map(function ($task, $order) {
            $serverTask = ServerTask::make([
                'order' => $order,
                'job' => get_class($task),
                'title' => $task->title(),
                'description' => $task->description(),
            ]);

            $serverTask->server()->associate($this->server);

            return $serverTask;
        });
    }
}
