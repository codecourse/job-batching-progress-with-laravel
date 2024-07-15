<?php

namespace App\Models;

use App\Server\States\Complete;
use App\Server\States\Failed;
use App\Server\States\InProgress;
use App\Server\States\Pending;
use App\Server\States\ServerTaskState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

class ServerTask extends Model
{
    use HasFactory;
    use HasStates;

    protected $casts = [
        'state' => ServerTaskState::class,
    ];

    protected $guarded = false;

    public function isPending(): bool
    {
        return $this->state->equals(Pending::class);
    }

    public function isInProgress(): bool
    {
        return $this->state->equals(InProgress::class);
    }

    public function isComplete(): bool
    {
        return $this->state->equals(Complete::class);
    }

    public function isFailed(): bool
    {
        return $this->state->equals(Failed::class);
    }

    public function next()
    {
        return $this->whereBelongsTo($this->server)
            ->where('order', '>', $this->order)
            ->first();
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
