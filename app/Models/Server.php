<?php

namespace App\Models;

use App\Observers\ServerObserver;
use App\Server\States\InProgress;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([ServerObserver::class])]
class Server extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function taskCurrentlyInProgress()
    {
        return $this->tasks()->whereState('state', InProgress::class)->first();
    }

    public function tasks()
    {
        return $this->hasMany(ServerTask::class)
            ->orderBy('order', 'asc');
    }
}
